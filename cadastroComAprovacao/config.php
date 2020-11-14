<?php 

    try {
        $dsn = "mysql:host=localhost;dbname=cadastro";
        $dbuser = "root";
        $dbpass = "root";
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        
    } catch (PDOException $e) {
        die($e->getMessage());
    }




?>