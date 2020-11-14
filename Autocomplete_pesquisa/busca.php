<?php 

    try {
        $pdo = new PDO("mysql: host=localhost; dbname=autocomplete_pesquisa", "root", "root");
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
        exit;
    }

    $array = array();

    if(!empty($_POST['texto'])) {
        $texto = $_POST['texto'];

        $sql = "SELECT * FROM pessoas WHERE nome LIKE :texto";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":texto", $texto.'%');
        $sql->execute();

        if($sql->rowCount() > 0) {
            foreach($sql->fetchAll() as $pessoa) {
                $array[] = array('nome'=>$pessoa['nome'], 'id'=>$pessoa['id']);
            }
        }

    }

    echo json_encode($array);

?>