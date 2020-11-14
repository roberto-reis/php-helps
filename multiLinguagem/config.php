<?php 

    try {
        global $pdo;
        $pdo = new PDO( "mysql:host=localhost; dbname=multilinguagem", "root", "root" );
    } catch(PDOException $e) {
        echo "Falhou: ".$e->getMessage();
    }




?>