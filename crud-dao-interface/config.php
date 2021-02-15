<?php 

    $db_name = "test";
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $pdo = new PDO("mysql:host=".$db_host.";dbname=".$db_name, $db_user, $db_pass);

?>