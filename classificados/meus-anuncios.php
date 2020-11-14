<?php require_once "pages/header.php"; ?>

<?php if(empty($_SESSION['cLogin'])): ?>
    <script>window.location.href="./";</script>
<?php endif; ?>

<div class="container">
    <h1 class="my-2">Meus Anuncios</h1>

    <a href="add-anuncios.php" class="btn btn-info mb-3">Adicionar</a>

    <table class="table table-striped">
        <head>
            <tr>
                <th>Foto</th>
                <th>Titulo</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </head>
        <?php 
            require_once "classes/Anuncios.class.php";
            $a = new Anuncios();
            $anuncios = $a->getMeusAnuncios();
            foreach($anuncios as $anuncio):
        ?>
        <tr>
            <td>
                <?php if(!empty($anuncio['url'])): ?>
                    <img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="70" border="0">
                <?php else: ?>
                    <img src="assets/images/anuncios/default.jpg" height="70" border="0">
                <?php endif; ?>
            </td>
            <td><?php echo $anuncio["titulo"]; ?></td>
            <td><?php echo number_format($anuncio["valor"], 2); ?></td>
            <td>
                <a href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-sm btn-outline-success">Editar</a>
                <a href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-sm btn-outline-danger">Deletar</a>
            </td>
        </tr>  
        <?php endforeach; ?>
    </table>

</div>


<?php require_once "pages/footer.php"; ?>