<h1> Lista de Tarefas </h1>

<form action="novo.php" method="post">
    <input type="text" name="tarefa" id="tarefa">
    <input type="submit" value="Salvar">
</form>

<?php 
    require_once "config.php";
    $tarefas = [];
    $sql = $pdo->query(" SELECT * FROM tarefas ");

    if($sql->rowCount() > 0) {
        $tarefas = $sql->fetchAll();
    }
?>
<ul>
    <?php foreach($tarefas as $tarefa): ?>
        <li><?php echo $tarefa["nome"]; ?></li>
    <?php endforeach; ?>
</ul>
