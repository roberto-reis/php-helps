<?php
    session_start();
    include_once "header.php";

    if(isset($_SESSION['aviso'])) {
        echo $_SESSION['aviso'];
        unset($_SESSION['aviso']);
    }
?>

    <form action="recebedor.php" method="post">

        <label for="nome">Nome:</label> <br>
        <input type="text" name="nome" id="nome"> <br><br>
 
        <label for="">E-mail:</label> <br>
        <input type="email" name="email" id="email"> <br><br>

        <label for="idade">Idade:</label> <br>
        <input type="number" name="idade" id="idade"> <br><br>

        <input type="submit" value="Enviar">
    
    </form>
    
</body>
</html>