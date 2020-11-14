<?php 
    class contatoController extends controller {

        public function index() {
            $dados = array(
                
            );

            $this->loadTemplate("contato", $dados);
        }

    }



?>