<?php 
include "Contato.class.php";
$contato = new Contato();

    if(!empty($_GET["id"])) {
        $id = $_GET["id"];

        $info = $contato->getInfo($id);
        if( empty( $info["email"] ) ) {
            header("Location: index.php");
            exit; 
        }

    } else {
        header("Location: index.php");
        exit;
    }


?>




<h1>Editar</h1>


<form action="editar_submit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $info['id'] ?>">

    Nome:<br>
    <input type="text" name="nome" value="<?php echo $info['nome']; ?>" id=""><br><br>

    E-mail:<br>
    <input type="email" name="email" value="<?php echo $info['email']; ?>" id="">


    <br><br>
    <input type="submit" value="Salvar">

</form>