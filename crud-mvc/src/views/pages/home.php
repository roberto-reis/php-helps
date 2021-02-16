<?php $render('header'); ?>

<a href="<?php echo $base; ?>/novo">Novo Usuário</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td>
                <a href="<?php echo $base ?>/usuario/<?php echo $usuario['id']; ?>/editar">[EDITAR]</a> - 
                <a href="<?php echo $base ?>/usuario/<?php echo $usuario['id']; ?>/excluir" onclick="return confirm('Tem certeza que deseja excluir?')">[EXCLUIR]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>



<?php $render('footer'); ?>