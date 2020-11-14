<?php 

    try {
        $pdo = new PDO("mysql: host=localhost; dbname=saas", "root", "root");
    } catch (PDOException $e) {
        echo "Falhou: ".$e->getMessage();
    }


    $dominio = $_SERVER['HTTP_HOST'];

    $sql = "SELECT * FROM usuarios WHERE dominio = ?";
    $sql = $pdo->prepare($sql);
    $sql->execute(array($dominio));

    if($sql->rowCount() > 0) {
        $cliente = $sql->fetch();

        if(file_exists("clientes/".$cliente["id"]."/index.php")) {
            require_once "clientes/".$cliente["id"]."/index.php";
        } else {
            echo "Sistema não localizado.";
        }
    } else {
        echo "Sistema fora do ar.";
    }
?>