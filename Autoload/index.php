<?php 
    spl_autoload_register(function($classes) {
        require_once "classes/".$classes.".php";
    });

$cavalo = new Cavalo();
$cavalo->falar();

$pessoa = new Pessoa();
$pessoa->andar();

?>