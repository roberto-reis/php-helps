<?php 
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=permissao_usuarios", "root", "root");
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
        exit;
    }


?>