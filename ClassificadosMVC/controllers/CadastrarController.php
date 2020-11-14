<?php 

    class CadastrarController extends Controller {

        public function index() {
            $dados = array();
            
            $u = new Usuarios();
            if( isset($_POST['btn_cadastrar']) ){
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $senha = $_POST['senha'];
                $telefone = addslashes($_POST['telefone']);

                if( !empty($nome) && !empty($email) && !empty($senha) ){
                    if($u->cadastrar($nome, $email, $senha, $telefone)){

                        $u->alert("alert-success", '<strong>Parabéns</strong>, Cadastrado com sucesso. <a href="login">Faça o login agora</a>');

                    } else{

                        $u->alert("alert-success", 'Este usuário já exíste! <a href="login">Faça o login agora</a> ');

                    }
                } else{

                    $u->alert("alert-warning", 'Preencha todos os campos!');

                }                

            }

            $this->loadTemplate("cadastrar", $dados);

        }


    }



?>