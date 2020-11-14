<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <title>Meu site</title>
</head>
<body>
    <h1>Este é o topo</h1>
    <a href="<?php echo BASE_URL; ?>">Home</a>
    <a href="<?php echo BASE_URL; ?>galeria">Galeria</a>

    <hr>


    <p>.....</p>

    <?php $this->loadViewInTemplate($viewName, $viewData); ?>

</body>
</html>