<?php 
    $vendas = array(3, 6, 7, 4, 2.5, 8);
    $custos = array(2, 4, 5, 2, 1, 6);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div style="width: 500px;">
        <canvas id="grafico"></canvas>
    
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        window.onload = function(){
            var contexto = document.getElementById("grafico").getContext("2d");
            new Chart(contexto, {
                type:'line',
                data:{
                    labels:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
                    datasets:[{
                        label:'Vendas',
                        backgroundColor:'#ff0000',
                        borderColor:'#ff0000',
                        data:[<?php echo implode(',', $vendas); ?>],
                        fill:false
                    }, {
                        label:'Custos',
                        backgroundColor:'#00ff00',
                        borderColor:'#00ff00',
                        data:[<?php echo implode(',', $custos); ?>],
                        fill:false
                    }]                    
                }
            });
        }


    </script>
</body>
</html>