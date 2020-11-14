<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <title>Meu site</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Classificados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>anuncios">Meus Anúncios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>sair">Sair</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>cadastrar">Cadastre-se</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    

    <?php $this->loadViewInTemplate($viewName, $viewData); ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</body>
</html>