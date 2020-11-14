<?php 

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=lixeira", "root", "root");
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
        exit;
    }


?>