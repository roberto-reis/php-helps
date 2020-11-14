<?php 
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=filtro_em_tabela", "root", "root");
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
    }

    if(isset($_POST["sexo"]) && $_POST["sexo"] != "") {
        $sexo = $_POST["sexo"];
        $sql = "SELECT * FROM usuarios WHERE sexo = :sexo ";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":sexo", $sexo);
        $sql->execute();
    } else {
        $sexo = "";
        $sql = "SELECT * FROM usuarios";    
        $sql = $pdo->query($sql);
    }

?>

<form method="post">
    <select name="sexo">
        <option value=""></option>
        <option value="0" <?php echo ($sexo == '0' )? "selected='selected'": ""; ?> >Feminino</option>
        <option value="1" <?php echo ($sexo == '1' )? "selected='selected'": ""; ?> >Masculino</option>
    </select>

    <input type="submit" value="Filtrar">
</form>

<table border="1" width="60%">
    <tr>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Idade</th>
    </tr>

    <?php
        $sexos = array(
            '0'=>'Feminino',
            '1'=>'Masculino'
        );

        if($sql->rowCount() > 0) {
            foreach($sql->fetchAll() as $usuarios):
            ?>

            <tr>
                <td><?php echo $usuarios["nome"]; ?></td>
                <td>
                    <?php echo $sexos[$usuarios["sexo"]]; ?>
                </td>
                <td><?php echo $usuarios["idade"]; ?></td>
            </tr>

            <?php
            endforeach;
        }
    ?>

</table>