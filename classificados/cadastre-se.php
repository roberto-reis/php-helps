<?php
    require_once "pages/header.php";
?>

    <div class="container">
        <h2>Cadastre-se</h2>

        <?php
            require_once "classes/Usuarios.class.php";
            $u = new Usuarios();
            if( isset($_POST['btn_cadastrar']) ){
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $senha = $_POST['senha'];
                $telefone = addslashes($_POST['telefone']);

                if( !empty($nome) && !empty($email) && !empty($senha) ){
                    if($u->cadastrar($nome, $email, $senha, $telefone)){
                        ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Parabéns</strong>, Cadastrado com sucesso. <a href="login.php">Faça o login agora</a>
                        </div>
                        <?php
                    } else{
                        ?>
                            <div class="alert alert-success" role="alert">
                                Este usuário já exíste! <a href="login.php">Faça o login agora</a> 
                            </div>
                        <?php
                    }
                } else{
                ?>
                    <div class="alert alert-warning" role="alert">
                        Preencha todos os campos
                    </div>
                <?php
                }                

            }
        ?>


        <form method="POST" action="">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" id="nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" class="form-control" id="senha">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" class="form-control" id="telefone">
            </div>

            <button type="submit" name="btn_cadastrar" class="btn btn-primary">Cadastrar</button>
        </form>


    </div>












    
<?php 
    require_once "pages/footer.php";
?>
