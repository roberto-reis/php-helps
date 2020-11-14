<?php 

$json = file_get_contents("https://api.hgbrasil.com/weather");
$json = json_decode($json);


print_r($json);


?>

<hr>

<br><br>


<?php 

    $json = array(
        "nome"=>"Jose Roberto",
        "sobrenome"=>"Reis",
        "idade"=>33,
        "Peso"=>70.5,
        "email"=>"roberto@gmail.com"

    );

    echo json_encode($json);


?>