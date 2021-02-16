<?php $render('header'); ?>

    <h2>Editar Usuário</h2>

    <form action="<?php echo $base; ?>/usuario/<?php echo $usuario['id']; ?>/editar" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>">
        
        <br><br>
        <button name="salvar">Salvar</button>
    
    </form>

<?php $render('footer'); ?>