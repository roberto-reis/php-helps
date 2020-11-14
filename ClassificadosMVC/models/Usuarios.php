<?php 

    class Usuarios extends Model {

        public function getTotalUsuarios() {

            $sql = $this->db->query("SELECT COUNT(*) as c FROM usuarios");
            $row = $sql->fetch();

            return $row['c'];
        }
        
        public function cadastrar($nome, $email, $senha, $telefone){
            $sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email");
            $sql->bindValue(":email", $email);
            $sql->execute();

            if($sql->rowCount() == 0){
                $sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
                $sql->bindValue(":nome", $nome);
                $sql->bindValue(":email", $email);
                $sql->bindValue(":senha", md5($senha));
                $sql->bindValue(":telefone", $telefone);
                $sql->execute();
                return true;
            } else{
                return false;
            }
        }

        public function login($email, $senha){
            $sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->execute();

            if($sql->rowCount() > 0){
                $dados = $sql->fetch();
                $_SESSION['cLogin'] = $dados['id'];
                return true;
            } else{

                return false;
            }
        }


        public function alert($type, $message) {
            echo '
                <div class="alert alert-message '.$type.' alert-dismissible fade show" role="alert">
                    '.$message.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }


    }

?>