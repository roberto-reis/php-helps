<?php 
    $ingredientes = [
        'açucar',
        'farinha de trigo',
        'ovo',
        'leite',
        'fermento em pó',
        'corante'
    ];

    echo "<h2> Ingredientes </h2>";

    echo "<ul>";
        // foreach($ingredientes as $chave => $valor) {
        //     echo "<li>Item ".($chave + 1).": ".$valor."</li><br>";
        // }
        foreach($ingredientes as $valor) {
            echo "<li>".$valor."</li>";
        }
    echo "</ul>";

?>