<?php 

    class ProdutoController extends Controller{

        public function index() {
 
        }

        public function abrir($id) {
            $dados = array();

            $a = new Anuncios();
            $u = new Usuarios();
        
            if(empty($id)) {
                header("Location: ".BASE_URL);
                exit;
            }
            
            $info = $a->getAnuncios($id);

            $dados['info'] = $info;

            $this->loadTemplate("produto", $dados);
        }

    }





?>