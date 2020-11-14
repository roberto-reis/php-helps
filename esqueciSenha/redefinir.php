<?php 
    require "config.php";

    if(!empty($_GET["token"])) {
        $token = $_GET["token"];

        $sql = " SELECT * FROM usuarios_token WHERE token=:token AND used=0 AND expirado > NOW() ";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":token", $token);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id = $sql["id_usuario"];

            if(!empty($_POST["novaSenha"])) {
                $novaSenha = md5($_POST["novaSenha"]);

                $sql = " UPDATE usuarios SET senha=:senha WHERE id=:id ";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(":senha", $novaSenha);
                $sql->bindValue(":id", $id);
                $sql->execute();

                $sql = " UPDATE usuarios_token SET used=1 WHERE token=:token ";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(":token", $token);
                $sql->execute();

                echo "Senha alterada com Sucesso!!";
                exit;
            }
?>
        <form action="" method="post">
            Digite a nova senha: <br>
            <input type="password" name="novaSenha" id="novaSenha"><br><br>

            <input type="submit" value="Mudar Senha">
        
        </form>

<?php
        } else {
            echo "<h3>Token inválido!</h3>";
            exit;
        }

    }









?>