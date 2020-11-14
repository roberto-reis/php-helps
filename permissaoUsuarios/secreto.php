<?php 
    session_start();
    require "config.php";
    require "classes/usuarios.class.php";



    if(!isset($_SESSION["logado"])) {
        header("Location: login.php");
        exit;
    }

    $usuarios = new Usuarios($pdo);
    $usuarios->setUsuarios($_SESSION["logado"]);

    if($usuarios->temPermissao("SECRET") == false) {
        header("Location: index.php");
        exit;
    }


?>


<h1>Página Secreta.</h1>