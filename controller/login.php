<?php

include "../class/Usuario.php";

if (!isset($_POST["usuario"])){
    header("location: ../ingresar.php?error=1");
    exit();
} 

if ($_POST["usuario"] == "") {
    header("location: ../ingresar.php?error=2");
    exit();
}

if ($_POST["contrasena"] == "") {
    header("location: ../ingresar.php?error=2");
    exit();
}

$usuario = Usuario::getByUserName($_POST["usuario"]);

// echo "<pre>";
// var_dump($usuario);
// echo "</pre>";


if (!$usuario) {
    header("location: ../index.html?error=3");
    exit();
}

if ($_POST["contrasena"] == $usuario->getClave()) {
    session_start();
    $_SESSION["login"] = true;
    $_SESSION["usuario"] = $usuario->getUsuario();
    $_SESSION["codigo"] = $usuario->getCodigo();
    header("location: ../index.php");
    exit();
} else {
    header("location: ../ingresar.php?error=3");
    exit();
}
