<?php 
    require "config.php";

    if( !empty($_POST["email"]) ) {
        $email = $_POST["email"];

        $sql = " SELECT * FROM usuarios WHERE email=:email ";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
           $sql = $sql->fetch();
           $id = $sql["id"];
           $token = md5(time().rand(0, 99999).rand(0, 99999));

           $sql = " INSERT INTO usuarios_token (id_usuario, token, expirado) VALUE (:id_usuario, :token, :expirado) ";
           $sql = $pdo->prepare($sql);
           $sql->bindValue(":id_usuario", $id);
           $sql->bindValue(":token", $token);
           $sql->bindValue(":expirado", date('Y-m-d H:i', strtotime('+2 months')));
           $sql->execute();

           $link = "http://localhost/projetos/esqueciSenha/redefinir.php?token=".$token;

           $mensagem = "Clique no link para redefinir a sua senha:<br>".$link;

           $assunto = "Redefinição de senha";
           $headedrs = "From: suporte@tiemmovimento.com.br"."\n\n"."X-Mailer: PHP/".phpversion();
       
           // mail($email, $assunto, $mensagem, $headedrs);

           echo $mensagem;
           exit;

        } else {
            echo "Não foi encontrado nenhum registro com esse email! <br><br>";
        }

    }

?>



<form action="" method="post">
    Qual seu e-mail? <br>
    <input type="email" name="email" id="email"><br><br>

    <input type="submit" value="Enviar">


</form>