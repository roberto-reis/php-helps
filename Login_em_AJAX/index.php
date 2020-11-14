<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post" id="form">
        <label for="email">E-mail:</label><br>
        <input type="email" name="email" id="email"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" id="senha"><br><br>

        <input type="submit" value="Entrar">



    </form>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(function(){
            $('#form').on('submit', function(e){
                e.preventDefault();

                var email = $('input[name=email]').val();
                var senha = $('input[name=senha]').val();

                $.ajax({
                    type:'POST',
                    url:'login.php',
                    data:{email:email, senha:senha},
                    success:function(msg){
                        alert(msg);
                        //window.location.href = "pagina.php";
                    }
                });

            });
        });
    </script>
</body>
</html>