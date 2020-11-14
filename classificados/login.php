<?php
    require_once "pages/header.php";
?>

    <div class="container">
        <h2>Faça Login</h2>

        <?php
            require_once "classes/Usuarios.class.php";
            $u = new Usuarios();
            if( isset($_POST['btn_login']) ){
                $email = addslashes($_POST['email']);
                $senha = $_POST['senha'];
              
                if($u->login($email, $senha)){
                    ?>
                        <script>window.location.href="./"</script>
                    <?php
                } else{
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Usuário e/ou Senha errados!
                        </div>
                    <?php
                }

            }
        ?>


        <form method="POST" action="">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" class="form-control" id="senha">
            </div>

            <button type="submit" name="btn_login" class="btn btn-primary">Entrar</button>
        </form>


    </div>












    
<?php 
    require_once "pages/footer.php";
?>
