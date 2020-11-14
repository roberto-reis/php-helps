<?php 

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=reservas", "root", "root");
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
        exit;
    }

?>