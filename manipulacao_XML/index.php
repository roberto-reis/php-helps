<?php

$xml = simplexml_load_file("arquivo.xml");

echo "Cidade: ".$xml->nome."<br><br>";

    
// Cria um arquivo xml apartir de um array
function array_to_xml($data, &$xml_data) {
    foreach($data as $key => $value) {
        if(is_array($value)) {
            if(is_numeric($key)) {
                $key = 'item'.$key;
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
            if( is_numeric($key) ) {
                $key = 'item'.$key;
            }
            $xml_data->addChild($key, htmlspecialchars($value));
        }
    }
}

$data = array(
    "nome"=>"Jose Roberto",
    "sobrenome"=>"Reis",
    "idade"=>33,
    "Peso"=>70.5,
    "email"=>"roberto@gmail.com",
    "caracteristicas" => array("amigo", "fiel", "companheiro", "legal")
);
$xml_data = new SimpleXMLElement('<data/>');
array_to_xml($data, $xml_data);

$result = $xml_data->asXML();

echo $result;


?>