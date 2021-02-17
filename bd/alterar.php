<?php
  // print_r($_POST);

  echo $_POST["id"];
  $salvar = true;

  if(!isset($_POST["nome"])){
    $salvar = false;
  }
  if(!isset($_POST["email"])){
    $salvar = false;
  }
  if(!isset($_POST["senha"])){
    $salvar = false;
  }

  if($salvar){
    $usuarios = file('usuario.bd');

    $usuarios[$_GET["id"]] = $_POST["nome"] .','. $_POST["email"] .','. $_POST["senha"] . "\n";

    file_put_contents("usuario.bd", $usuarios);

    header("location: ../index.php");
  }
