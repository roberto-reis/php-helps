<?php 
    require_once "classe1.php";
    require_once "classe2.php";
    require_once "classes/matematica/basico.php";

    use classes\matematica\Basico;

    $a = new classe2\MinhaClass();
    echo $a->testar()."<br>"; 
    
    $basico = new Basico();
    echo "Resultado da somar: ".$basico->somar(5, 4);

?>