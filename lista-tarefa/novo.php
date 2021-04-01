<?php 
    require_once 'config.php';

    $tarefa = filter_input(INPUT_POST, 'tarefa');

    if($tarefa) {
        $sql = $pdo->prepare(" INSERT into tarefas (nome) values (:nome) ");
        $sql->bindValue(':nome', $tarefa);
        $sql->execute();

        header("Location: index.php");
    }








?>