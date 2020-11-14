<?php 
    session_start();
    require_once "vendor/autoload.php"; 
    require_once "config.php";

    spl_autoload_register(function($class){

        if(file_exists('controllers/'.$class.'.php')) {
            require_once 'controllers/'.$class.'.php';
        }
        elseif(file_exists('models/'.$class.'.php')) {
            require_once 'models/'.$class.'.php';
        }
        elseif(file_exists('core/'.$class.'.php')) {
            require_once 'core/'.$class.'.php';
        }

        
    });

    $log = new Monolog\Logger("teste");
    $log->pushHandler(new Monolog\Handler\StreamHandler('erros.log', Monolog\Logger::WARNING));
    $log->error("Aviso! deus Algo errado!");

    $core = new Core();
    $core->run();



?>