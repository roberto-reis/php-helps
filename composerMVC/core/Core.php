<?php 

    class Core {

        public function run() {
           $url = '/';
           if(isset($_GET['url'])) {
               $url.= $_GET['url'];
           }

           $params = array();
           
           if(!empty($url) && $url != '/') {
                $url = explode('/', $url);
                array_shift($url);

                $correntController = $url[0].'Controller';
                array_shift($url);

                if(isset($url) && !empty($url[0])) {
                    $currentAction = $url[0];
                    array_shift($url);
                } else {
                    $currentAction = 'index';
                }

                if(count($url) > 0) {
                    $params = $url;
                }

           } else {
               $correntController = 'homeController';
               $currentAction = 'index';
           }

           $c = new $correntController();
           call_user_func_array(array($c, $currentAction), $params);



        }

    }

?>