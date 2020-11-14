<?php 
    session_start();
    require "config.php";
    require "classes/usuarios.class.php";

    if(!empty($_POST["email"])) {
        $email = addslashes($_POST["email"]);
        $senha = md5($_POST["senha"]);

        $usuarios = new Usuarios($pdo);

        if($usuarios->fazerLogin($email, $senha)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Usuários e/ou senha não confere!";
        }

    }


?>

<h1>LOGIN</h1>
<form action="" method="post">
    <label for="email">E-mail:</label><br>
    <input type="email" name="email" id="email"><br><br>

    <label for="senha">Senha:</label><br>
    <input type="password" name="senha" id="senha"><br><br>

    <input type="submit" value="Entrar">

</form>