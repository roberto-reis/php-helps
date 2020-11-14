<?php 

class Core {

    public function run() {
        $url = '/';
        if(isset($_GET['url'])) {
            $url.= $_GET['url'];
        }

        $url = $this->checkRoutes($url);

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

        if(!file_exists('controllers/'.$correntController.'.php') || !method_exists($correntController, $currentAction)) {
            $correntController = 'notfoundController';
            $currentAction = 'index';
        }

        $c = new $correntController();
        call_user_func_array(array($c, $currentAction), $params);

    }

    public function checkRoutes($url) {
        global $routes;

        foreach($routes as $pt => $newurl) {
            // Identifica os argumentos e substitui por regex
            $pattern = preg_replace('(\{[a-z0-9]{1,}\})','([a-z0-9]{1,})', $pt);
            
            // Faz o match da URL
            if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1) {
                // Removendo os 2 primeiros resultados
                array_shift($matches);
                array_shift($matches);

                // Paga todos os argumentos para associar
                $itens = array();
                if(preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)) {
                    $itens = preg_replace('(\{|\})', '', $m[0]);
                }

                // Faz a associação
                $arg = array();
                foreach($matches as $key => $match) {
                    $arg[$itens[$key]] = $match;
                }

                // Monta a nova URL
                foreach($arg as $argkey => $argvalue) {
                    $newurl = str_replace(':'.$argkey, $argvalue, $newurl);
                }

                $url = $newurl;

                break;

            }

        }

        return $url;

    }





}

?>