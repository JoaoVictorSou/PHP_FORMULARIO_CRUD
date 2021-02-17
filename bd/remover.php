<?php

$usuarios = file('usuario.bd');

if(isset($_GET["remover"])){
  unset($usuarios[$_GET["remover"]]);
  file_put_contents("usuario.bd", $usuarios);

  header("location: ../index.php");
}
