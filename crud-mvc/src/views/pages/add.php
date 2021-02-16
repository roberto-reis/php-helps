<?php $render('header'); ?>

    <h2>Adicionar Novo Usuário</h2>

    <form action="<?php echo $base; ?>/novo" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        
        <br><br>
        <button name="adicionar">Adicionar</button>
    
    </form>

<?php $render('footer'); ?>