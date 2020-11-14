<?php 

    class galeriaController extends controller{

        public function index() {
            $dados = array(
                "qt" => 8
            );

            $this->loadTemplate("galeria", $dados);
        }

        public function abrir($id, $titulo) {
            echo "ID: ".$id."<br>";
            echo "Titulo: ".$titulo;
        }


    }



?>