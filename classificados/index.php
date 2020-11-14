<?php
    require_once "pages/header.php";

    require_once "classes/Anuncios.class.php";
    require_once "classes/Usuarios.class.php";
    require_once "classes/Categorias.class.php";
    $a = new Anuncios();
    $u = new Usuarios();
    $c = new Categorias();

    $friltos = array(
        'categoria' => '',
        'preco' => '',
        'estado' => ''
    );
    if(isset($_GET['filtros'])) {
        $friltos = $_GET['filtros'];
    }

    $total_anuncios = $a->getTotalAnuncios($friltos);
    $total_usuarios = $u->getTotalUsuarios();

    $page = 1;
    if(isset($_GET['p']) && !empty($_GET['p'])){
        $page = addslashes($_GET['p']);
    }
    $por_pagina = 2;
    $total_paginas = ceil($total_anuncios / $por_pagina);

    $anuncios = $a->getUltimosAnuncios($page, $por_pagina, $friltos);

    $categorias = $c->getLista();
?>


    <div class="container-fluid">
        <div class="jumbotron">
            <h2>Nós temos hoje <?php echo $total_anuncios; ?> anúcios.</h2>
            <p>E mais de <?php echo $total_usuarios; ?> usuários cadastrados</p>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h4>Pesquisa avançada</h4>
                <form method="get">
                    <div class="form-group">
                        <label for="categorias">Categorias:</label>
                        <select id="categorias" name="filtros[categoria]" class="form-control">
                            <option></option>
                            <?php foreach($categorias as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id'] == $friltos['categoria'])  ? 'selected="selected"': ''; ?> ><?php echo $cat['nome']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <select id="preco" name="filtros[preco]" class="form-control">
                            <option></option>
                            <option value="0-50" <?php echo ($friltos['preco'] == '0-50')  ? 'selected="selected"' : ''; ?> >R$ 0 - 50</option>
                            <option value="51-100" <?php echo ($friltos['preco'] == '51-100')  ? 'selected="selected"' : ''; ?> >R$ 51 - 100</option>
                            <option value="101-200" <?php echo ($friltos['preco'] == '101-200')  ? 'selected="selected"' : ''; ?> >R$ 101 - 200</option>
                            <option value="201-500" <?php echo ($friltos['preco'] == '201-500')  ? 'selected="selected"' : ''; ?> >R$ 201 - 500</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select id="estado" name="filtros[estado]" class="form-control">
                            <option></option>
                            <option value="0" <?php echo ($friltos['estado'] == '0')  ? 'selected="selected"' : ''; ?> >Ruim</option>
                            <option value="1" <?php echo ($friltos['estado'] == '1')  ? 'selected="selected"' : ''; ?> >Bom</option>
                            <option value="2" <?php echo ($friltos['estado'] == '2')  ? 'selected="selected"' : ''; ?> >Ótimo</option>
                        </select>
                    </div>

                    <input type="submit" value="Buscar" class="btn btn-primary">
                </form>
            </div>

            <div class="col-sm-9">
                <h4>Últimos Anúncios</h4>
                <table class="table table-striped">
                    <tbody>
                        <?php foreach($anuncios as $anuncio): ?>
                        <tr>
                            <td>
                                <?php if(!empty($anuncio['url'])): ?>
                                    <img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="70" border="0">
                                <?php else: ?>
                                    <img src="assets/images/anuncios/default.jpg" height="70" border="0">
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a><br>
                                <?php echo $anuncio['categoria']; ?>
                            </td>
                            <td><?php echo number_format($anuncio["valor"], 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <ul class="pagination">
                    <?php for($q = 1; $q <= $total_paginas; $q++): ?>
                        <li class="page-item <?php echo ($page==$q) ? 'active' : ''; ?>"><a href="index.php?<?php                            
                            $w = $_GET;
                            $w['p'] = $q;
                            echo http_build_query($w);
                            ?>" class="page-link"><?php echo $q; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>

    </div>



    
<?php 
    require_once "pages/footer.php";
?>




