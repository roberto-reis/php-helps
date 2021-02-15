<?php 
    require_once "config.php";
    require_once "dao/UsuarioDaoMysql.php";

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $usuario = false;
    $id = filter_input(INPUT_GET, 'id');

    if($id) {
        $usuario = $usuarioDao->findById($id);
    }

    if($usuario === false) {
        header("Location: index.php");
        exit;
    }

?>
<form action="editar_action.php" method="post">
    <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
    <label for="nome">Nome: </label>
    <input type="text" name="nome" id="nome" value="<?php echo $usuario->getNome(); ?>">
    <br><br>

    <label for="email">E-mail: </label>
    <input type="email" name="email" id="email" value="<?php echo $usuario->getEmail(); ?>">
    <br><br>

    <button name="salvar">Salvar</button>
</form>