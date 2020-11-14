<?php

require "Usuario.class.php";

$usuario = new Usuario(2);
$usuario->delete();

echo "Usuario deletado com sucesso!";

