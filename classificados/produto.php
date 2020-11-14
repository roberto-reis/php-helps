<?php
    require_once "pages/header.php";

    require_once "classes/Anuncios.class.php";
    require_once "classes/Usuarios.class.php";
    $a = new Anuncios();
    $u = new Usuarios();

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = addslashes($_GET['id']);
    } else {
        header("Location: login.php");
    }
    
    $info = $a->getAnuncios($id);
    
?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-4 mt-3">
                <div id="meuCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach($info['fotos'] as $chave => $foto): ?>
                            <div class="carousel-item <?php echo ($chave == 0) ? 'active': ''; ?>">
                                <img src="assets/images/anuncios/<?php echo $foto['url']; ?>" class="d-block w-100">
                            </div>
                        <?php endforeach; ?>
 
                    </div>
                    <a class="carousel-control-prev" href="#meuCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#meuCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-8 mt-3">
                <h1><?php echo $info['titulo']; ?></h1>
                <h4><?php echo $info['categoria']; ?></h4>
                <p><?php echo $info['descricao']; ?></p>
                <br>
                <h3>R$ <?php echo number_format($info['valor'], 2); ?></h3>
                <h4>Telefone: <?php echo $info['telefone']; ?></h4>
            </div>
        </div>

    </div>



    
<?php 
    require_once "pages/footer.php";
?>




