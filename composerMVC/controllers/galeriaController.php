<?php 

    class galeriaController extends controller{

        public function index() {
            $dados = array(
                "qt" => 8
            );

            $this->loadTemplate("galeria", $dados);
        }


    }



?>