<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form id="form" method="POST" enctype="multipart/form-data" action="recebedor.php">
        Nome: <br>
        <input type="text" name="nome" id="nome"><br><br>

        Foto: <br>
        <input type="file" name="foto" id="foto"><br><br>


        <input type="submit" value="Enviar">



    </form>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        
        $(function(){

            $('#form').on('submit', function(e){
                e.preventDefault();

                var form = $('#form')[0];
                var data = new FormData(form);

                $.ajax({
                    type:'POST',
                    url:'recebedor.php',
                    data:data,
                    contentType:false,
                    processData:false,
                    success:function(msg){
                        alert(msg);
                    }
                });
            });

        });
    </script>
</body>
</html>