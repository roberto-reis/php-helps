<?php

    class LoginController extends Controller {

        public function index() {
            $dados = array();

            $u = new Usuarios();
        
            if( isset($_POST['btn_login']) ){
                $email = addslashes($_POST['email']);
                $senha = $_POST['senha'];
              
                if(!empty($email) && !empty($senha)) {
                    if($u->login($email, $senha)){
                        header("Location: ".BASE_URL);
    
                    } else{    
                        $u->alert("alert-danger", "Usuário e/ou Senha errados!");    
                    }
                } else {
                    $u->alert("alert-warning", "Preencha todos os campos!");
                }    
            }
            $this->loadTemplate("login", $dados);
        }


    }



?>



