<?php 
    if(isset($_POST["nome"]) && !empty($_POST["nome"])) {
        $nome = addslashes($_POST["nome"]);
        $email = addslashes($_POST["email"]);
    }

    require "config.php";

    $pdo->query(" INSERT INTO usuarios SET nome='$nome', email='$email' ");

    $id = $pdo->lastInsertId();

    $md5 = md5($id);

    $link = "http://localhost/projetos/cadastroComAprovacao/comfirmar.php?h=".$md5;

    $assunto = "Confirme seu cadastro";
    $msg = "Clique no link abaixo para confirmar seu cadastro:\n\n".$link;
    $headedrs = "From: suporte@tiemmovimento.com.br"."\n\n"."X-Mailer: PHP/".phpversion();

    mail($email, $assunto, $msg, $headedrs);

    echo "<h2>OK! Confirme seu cadastro agora!</h2>";


?>


<form action="" method="post">
    Nome: <br>
    <input type="text" name="nome" id="nome"><br><br>

    Email: <br>
    <input type="email" name="email" id="email"><br><br>


    <input type="submit" value="Cadastrar">

</form>
