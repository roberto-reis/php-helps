<?php 

    try {
        $pdo = new PDO("mysql: host=localhost; dbname=login_ajax", "root", "root");
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
    }

    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            echo "Usuário Logado com Sucesso";
        } else {
            echo "email e/ou senha incorretos!";
        }

    } else {
        echo "Preencha todo os campos!";
    }


?>