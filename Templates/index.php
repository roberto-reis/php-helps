<?php 
    require_once "Template.php";

    $array = array(
        "titulo"=>"Titulo da Pagína",
        "nome"=>"Fulano",
        "idade"=>33
    );

    $tpl = new Template("template.phtml");
    $tpl->render($array);

?>