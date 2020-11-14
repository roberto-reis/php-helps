<h1>Digite e-mail ou CPF do usuário</h1>

<form method="GET">
    <input type="text" name="campo" id="campo">

    <input type="submit" value="Pesquisar">

</form>

<hr>

<?php 
    if(!empty($_GET["campo"])) {
        $campo = $_GET["campo"];
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=pesquisa_colunas", "root", "root");
        } catch (PDOException $e) {
            echo "ERRO: ".$e->getMessage();
            exit;
        }


        $sql = "SELECT * FROM usuarios WHERE (email = :email) OR (cpf = :cpf)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":email", $campo);
        $sql->bindValue(":cpf", $campo);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            echo"Nome: ".$sql["nome"];
        }


    }




?>

