<fieldset>
    <legend>Adicionar uma Foto</legend>

    <form method="post" enctype="multipart/form-data">
        Titulo: <br>
        <input type="text" name="titulo" id="titulo"><br><br>

        <label for="foto">Foto:</label>
        <input type="file" name="arquivo" id="foto"><br><br>
        
        <input type="submit" value="Enviar Arquivo">
    </form>
</fieldset>
<br><br>

<?php foreach($fotos as $foto): ?>

    <img src="assets/images/galeria/<?php echo $foto['url']; ?>" width="300" border="0" alt=""><br>
    <?php echo $foto['titulo']; ?>
    <hr>

<?php endforeach; ?>