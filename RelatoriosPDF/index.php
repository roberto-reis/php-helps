<?php

use Mpdf\Mpdf;

ob_start();
?>

<h1>Relatórios</h1>

<table border="1">
    <tr>
        <th>Nome do Cliente</th>
        <th>Valor do Pedido</th>
        <th>Data de entrega</th>
    </tr>
    <tr>
        <td>Roberto</td>
        <td>R$ 1.000</td>
        <td>04/08/2020</td>
    </tr>
    <tr>
        <td>Jose</td>
        <td>R$ 1.000</td>
        <td>04/08/2020</td>
    </tr>
    <tr>
        <td>Reis</td>
        <td>R$ 1.000</td>
        <td>04/08/2020</td>
    </tr>
    <tr>
        <td>Batista</td>
        <td>R$ 1.000</td>
        <td>04/08/2020</td>
    </tr>
    <tr>
        <td>Josy</td>
        <td>R$ 1.000</td>
        <td>04/08/2020</td>
    </tr>
</table>

<?php 
    $html = ob_get_contents();
    ob_end_clean();



require_once 'vendor/autoload.php';

$arquivo = md5(time().rand(0,99999)).'.pdf';

$mpdf = new Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output($arquivo, 'F');

$link = 'http://localhost/projetos/phpdozero/RelatoriosPDF/'.$arquivo;

echo "Faça o download no link: ".$link;

// I = abrir no browser
// D = Faz o download
// F = Salva no servidor
// https://mpdf.github.io/

?>