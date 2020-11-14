<?php 
    require "config.php";

?>

<h1>Lista de Usuários</h1>

<table border="1" width="50%">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>

    <?php 
        $sql = " SELECT * FROM usuarios WHERE status = '1' ";
        $sql = $pdo->query($sql);

        if($sql->rowCount() > 0): 
            foreach($sql->fetchAll() as $usuarios):
    ?>

    <tr>
        <td><?php echo $usuarios["nome"]; ?></td>
        <td><?php echo $usuarios["email"]; ?></td>
        <td><a href="excluir.php?id=<?php echo $usuarios['id']; ?>">Excluir</a></td>
    </tr>

    <?php 
        endforeach; endif;    
    ?>



</table>