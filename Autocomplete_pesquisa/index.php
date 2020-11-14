<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <input type="text" name="busca" id="busca">
    <ul id="resultado">
    </ul>




    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(function(){

            $('#busca').on('keyup', function(){
                var texto = $(this).val();

                $.ajax({
                    url:'busca.php',
                    type:'POST',
                    dataType:'json',
                    data:{texto:texto},
                    success:function(json){
                        var html = '';

                        for(var i in json) {
                            html += '<li><a href="usuario.php?id='+json[i].id+'">'+json[i].nome+'</a></li>';
                        }

                        $('#resultado').html(html);

                    }
                });
            });
            
        });
    </script>
</body>
</html>