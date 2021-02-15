<?php
    require_once "config.php";
    require_once "dao/UsuarioDaoMysql.php";

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $lista = $usuarioDao->findAll();

?>


<a href="adicionar.php">Adicionar</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?php echo $usuario->getId(); ?></td>
            <td><?php echo $usuario->getNome(); ?></td>
            <td><?php echo $usuario->getEmail(); ?></td>
            <td>
                <a href="editar.php?id=<?php echo $usuario->getId(); ?>">[ EDITAR ]</a>
                <a href="excluir.php?id=<?php echo $usuario->getId(); ?>" onclick="return confirm('Deseja excluir?')">[ EXCLUIR ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>