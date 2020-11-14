<?php require_once "pages/header.php"; ?>

<?php if(empty($_SESSION['cLogin'])): ?>
    <script>window.location.href="./";</script>
<?php 
    endif;

    require_once "classes/Anuncios.class.php";
    $a = new Anuncios();
    if( isset($_POST['titulo']) && !empty($_POST['titulo']) ) {
        $titulo = addslashes($_POST['titulo']);
        $categoria = addslashes($_POST['categoria']);
        $valor = addslashes($_POST['valor']);
        $descricao = addslashes($_POST['descricao']);
        $estado = addslashes($_POST['estado']);

        $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
        ?>
            <div class="alert alert-success" role="alert">
                Anúncio cadastrado com sucesso!
            </div>
        <?php
    }
?>

<div class="container">
    <h1 class="my-3">Meus Anuncios - Adicionar Anúncios</h1>

    <form action="" method="post" class="mt-3" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categorias:</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php 
                    require_once "classes/Categorias.class.php";
                    $c = new Categorias();
                    $cats = $c->getLista();
                    foreach($cats as $cat):
                ?>
                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" class="form-control" id="titulo">
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" class="form-control" id="valor">
        </div>
        
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="8"></textarea>
        </div>

        <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
            <select name="estado" id="estado">
                <option value="0">Ruim</option>
                <option value="1">Bom</option>
                <option value="2">Ótimo</option>
            </select>
        </div>

        <input type="submit" value="Adicionar" class="btn btn-primary">

    </form>



</div>


<?php require_once "pages/footer.php"; ?>