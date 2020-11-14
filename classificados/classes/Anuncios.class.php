<?php


    class Anuncios {

        public function getTotalAnuncios($friltos) {
            global $pdo;

            $friltostring = array('1=1');
            if(!empty($friltos['categoria'])){
                $friltostring[] = 'anuncios.id_categoria = :id_categoria';
            }
            if(!empty($friltos['preco'])){
                $friltostring[] = 'anuncios.valor BETWEEN :preco1 AND :preco2';
            }
            if(!empty($friltos['estado'])){
                $friltostring[] = 'anuncios.estado = :estado';
            }

            $sql = $pdo->prepare("SELECT COUNT(*) as c FROM anuncios WHERE ".implode(' AND ', $friltostring));

            if(!empty($friltos['categoria'])){
                $sql->bindValue(":id_categoria", $friltos['categoria']);
            }
            if(!empty($friltos['preco'])){
                $preco = explode('-', $friltos['preco']);                
                $sql->bindValue(":preco1", $preco[0]);
                $sql->bindValue(":preco2", $preco[1]);
            }
            if(!empty($friltos['estado'])){
                $sql->bindValue(":estado", $friltos['estado']);
            }
            $sql->execute();
            $row = $sql->fetch();

            return $row['c'];
        }

        public function getUltimosAnuncios($page, $perPage, $friltos) {
            global $pdo;

            $offset = ($page - 1) * $perPage;
            $array = array();

            $friltostring = array('1=1');
            if(!empty($friltos['categoria'])){
                $friltostring[] = 'anuncios.id_categoria = :id_categoria';
            }
            if(!empty($friltos['preco'])){
                $friltostring[] = 'anuncios.valor BETWEEN :preco1 AND :preco2';
            }
            if(!empty($friltos['estado'])){
                $friltostring[] = 'anuncios.estado = :estado';
            }

            $sql = $pdo->prepare("SELECT *, (select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncio = anuncios.id limit 1) AS url,
            (select categorias.nome from categorias where categorias.id = anuncios.id_categoria ) AS categoria FROM anuncios WHERE ".implode(' AND ', $friltostring)." ORDER BY id DESC LIMIT $offset, 2");

            if(!empty($friltos['categoria'])){
                $sql->bindValue(":id_categoria", $friltos['categoria']);
            }
            if(!empty($friltos['preco'])){
                $preco = explode('-', $friltos['preco']);                
                $sql->bindValue(":preco1", $preco[0]);
                $sql->bindValue(":preco2", $preco[1]);
            }
            if(!empty($friltos['estado'])){
                $sql->bindValue(":estado", $friltos['estado']);
            }
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }
            return $array; 
        }

        public function getMeusAnuncios() {
            global $pdo;

            $array = array();
            $sql = $pdo->prepare("SELECT *, (select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncio = anuncios.id limit 1) AS url FROM anuncios WHERE id_usuario = :id_usuario");
            $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }
            return $array;
        }

        public function getAnuncios($id) {
            $array = array();
            global $pdo;

            $sql = $pdo->prepare("SELECT *, 
            (select categorias.nome from categorias where categorias.id = anuncios.id_categoria) AS 'categoria', (select usuarios.telefone from usuarios where usuarios.id = anuncios.id_usuario) AS 'telefone' FROM anuncios WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetch();
                $array['fotos'] = array();

                $sql = $pdo->prepare("SELECT id, url FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
                $sql->bindValue(":id_anuncio", $id);
                $sql->execute();

                if($sql->rowCount() > 0) {
                    $array['fotos'] = $sql->fetchAll();
                }

            }
            return $array;
        }

        public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado) {
            global $pdo;

            $sql = $pdo->prepare("INSERT INTO anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado");
            $sql->bindValue(":titulo", $titulo);
            $sql->bindValue(":id_categoria", $categoria);
            $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
            $sql->bindValue(":descricao", $descricao);
            $sql->bindValue(":valor", $valor);
            $sql->bindValue(":estado", $estado);
            $sql->execute();

        }

        public function aditAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id) {
            global $pdo;

            $sql = $pdo->prepare("UPDATE anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado WHERE id = :id");
            $sql->bindValue(":titulo", $titulo);
            $sql->bindValue(":id_categoria", $categoria);
            $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
            $sql->bindValue(":descricao", $descricao);
            $sql->bindValue(":valor", $valor);
            $sql->bindValue(":estado", $estado);
            $sql->bindValue(":id", $id);
            $sql->execute();

            if(count($fotos) > 0) {
                for($q=0; $q < count($fotos['tmp_name']); $q++) {
                    $tipo = $fotos['type'][$q];
                    // Verifica se é uma imagem
                    if(in_array($tipo, array('image/jpeg', 'image/png'))) {
                        // Gera um novo nome
                        $tmpname = md5(time().rand(0, 9999)).'.jpg';
                        // Salva na pasta correta
                        move_uploaded_file($fotos['tmp_name'][$q], 'assets/images/anuncios/'.$tmpname);
                        
                        // Redimensionamento da imagem
                        list($width_orig, $height_orig) = getimagesize('assets/images/anuncios/'.$tmpname);
                        $ratio = $width_orig/$height_orig;

                        $width = 500;
                        $height = 500;

                        if($width/$height > $ratio) {
                            $width = $height * $ratio;
                        } else {
                            $height = $width * $ratio;
                        }

                        $img = imagecreatetruecolor($width, $height);
                        if($tipo == 'image/jpeg') {
                            $origi = imagecreatefromjpeg('assets/images/anuncios/'.$tmpname);
                        } elseif($tipo == 'image/png') {
                            $origi = imagecreatefrompng('assets/images/anuncios/'.$tmpname);
                        }
                        imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                        // Salva a imagem nova
                        imagejpeg($img, 'assets/images/anuncios/'.$tmpname, 80);

                        // Salva a URL da imagem no banco da dados
                        $sql = $pdo->prepare("INSERT INTO anuncios_imagens SET id_anuncio = :id_anuncio, url = :url");
                        $sql->bindValue(":id_anuncio", $id);
                        $sql->bindValue(":url", $tmpname);
                        $sql->execute();

                    }
                }
            }
        }

        public function excluirAnuncio($id) {
            global $pdo;

            // Remove a imagen do anuncio
            $sql = $pdo->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
            $sql->bindValue(":id_anuncio", $id);
            $sql->execute();

            // Remove o anuncio
            $sql = $pdo->prepare("DELETE FROM anuncios WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
        }

        public function excluirFoto($id) {
            global $pdo;
            $id_anuncio = 0;

            // Pega id do anuncio
            $sql = $pdo->prepare("SELECT id_anuncio FROM anuncios_imagens WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            if($sql->rowCount() > 0) {
                $row = $sql->fetch();
                $id_anuncio = $row['id_anuncio'];
            }

            // Remove a imagen do anuncio
            $sql = $pdo->prepare("DELETE FROM anuncios_imagens WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            return $id_anuncio;
        }



    }



?>