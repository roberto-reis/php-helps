<?php

function is_valido($cache) {
    $ultima_modificacao = filectime($cache);
    $c = time() - $ultima_modificacao;

    // Codição para setar o tempo(segundos) do cache
    return ($c > 20) ? false : true;
}

$p = "pagina";

if(isset($_GET['p']) && !empty($_GET['p']) && file_exists('paginas/'.$_GET['p'].'.php')) {
    $p = $_GET['p'];
}

if(file_exists('caches/'.$p.'.cache') && is_valido('caches/'.$p.'.cache')) {
    require_once "caches/".$p.".cache";
} else {
    ob_start();
    require_once "paginas/".$p.".php";
    $html = ob_get_contents();
    ob_end_clean();

    file_put_contents("caches/".$p.".cache", $html);
    echo $html;

}





?>