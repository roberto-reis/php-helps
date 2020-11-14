<?php
    include_once "class/Usuario.php";
    
    if(isset($_POST["login"])) {
        $usuario = new Usuario();

        if(!empty($_POST["email"]) && !empty($_POST["senha"])) {

            $usuario->setEmail($_POST["email"]);
            $usuario->setSenha($_POST["senha"]);

            $usuario->login(); 
        } else {
            $usuario->alert("alert-danger", "Preencha todos os campos!");
        }

    }

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Faça seu Login</title>
  </head>
  <body>
    <h1 class="text-center">Faça seu Login</h1>


    <div class="container">
        <div class="row">
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                </div>
                
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" class="form-control" id="senha">
                </div>

                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>