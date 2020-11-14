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
        if(isset($_FILES['fotos'])) {
            $fotos = $_FILES['fotos'];
        } else {
            $fotos = array();
        }

        $a->aditAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $_GET['id']);

        header("Location: meus-anuncios.php");
    }

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $info = $a->getAnuncios($_GET['id']); 
    } else {
        header("Location: meus-anuncios.php");
    }

?>

<div class="container">
    <h1 class="my-3">Meus Anuncios - Editar Anúncios</h1>

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
                    <option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria']==$cat['id'])?'selected="selected"':''; ?>><?php echo $cat['nome']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo $info['titulo']; ?>">
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" class="form-control" id="valor" value="<?php echo $info['valor']; ?>">
        </div>
        
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="8" ><?php echo $info['descricao']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
            <select name="estado" id="estado">
                <option value="0" <?php echo ($info['estado']=='0')?'selected="selected"':''; ?>>Ruim</option>
                <option value="1" <?php echo ($info['estado']=='1')?'selected="selected"':''; ?>>Bom</option>
                <option value="2" <?php echo ($info['estado']=='2')?'selected="selected"':''; ?>>Ótimo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="add_foto">Foto do anúcio:</label>
            <input type="file" name="fotos[]" multiple id="add_foto" class="mb-3">
            <div class="card">
                <div class="card-header">Fotos do Anúncios</div>
                <div class="card-body">
                    <?php foreach($info['fotos'] as $foto): ?>
                        <div class="foto_item mr-2">
                            <img src="assets/images/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail" border="0">
                            <a href="excluir-foto.php?id=<?php echo $foto['id']; ?>" class="btn btn-sm btn-outline-danger mt-1">Excluir</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <input type="submit" value="Salvar" class="btn btn-primary">

    </form>



</div>


<?php require_once "pages/footer.php"; ?>