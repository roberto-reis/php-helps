<?php 

    class HomeController extends Controller {

        public function index() {
            $dados = array();

            $a = new Anuncios();
            $u = new Usuarios();
            $c = new Categorias();
        
            $friltos = array(
                'categoria' => '',
                'preco' => '',
                'estado' => ''
            );
            if(isset($_GET['filtros'])) {
                $friltos = $_GET['filtros'];
            }
        
            $total_anuncios = $a->getTotalAnuncios($friltos);
            $total_usuarios = $u->getTotalUsuarios();
        
            $page = 1;
            if(isset($_GET['p']) && !empty($_GET['p'])){
                $page = addslashes($_GET['p']);
            }
            $por_pagina = 2;
            $total_paginas = ceil($total_anuncios / $por_pagina);
        
            $anuncios = $a->getUltimosAnuncios($page, $por_pagina, $friltos);
        
            $categorias = $c->getLista();

            $dados['total_anuncios'] = $total_anuncios;
            $dados['total_usuarios'] = $total_usuarios;
            $dados['categorias'] = $categorias;
            $dados['friltos'] = $friltos;
            $dados['anuncios'] = $anuncios;
            $dados['anuncios'] = $anuncios;
            $dados['total_paginas'] = $total_paginas;
            $dados['total_paginas'] = $total_paginas;
            $dados['page'] = $page;

            $this->loadTemplate("home", $dados);
        }



        
    }



?>