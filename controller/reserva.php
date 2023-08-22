<?php
include "../class/Reservacion.php";

if (!isset($_POST["accion"])) {
    header("location: ../reservar.php");
    exit();
}

// VALIDACION DE LOS DATOS

// CREAR
if ($_POST["accion"] == "crear") {
    $reserva = new Reservacion(0, 
    $_POST["nombre"], 
    $_POST["email"], 
    $_POST["fecha"],
    $_POST["cantidad"],
    1,
    "");

    $respuesta = $reserva->create();

    if ($respuesta == "Ok") {
        header("location: ../reservar.php?cod=1");
        exit();
    }else{
        header("location: ../reservar.php?cod=4&error=".$respuesta);
        exit();
    }
}

// Editar
if ($_POST["accion"] == "editar") {
    $reserva = new Reservacion(
    $_POST["nombre"], 
    $_POST["email"], 
    $_POST["fecha"], 
    $_POST["cantidad"],
);

    $respuesta = $reserva->update();

    if ($respuesta == "Ok") {
        header("location: ../reservar.php?cod=2");
        exit();
    }else{
        header("location: ../reservar.php?cod=4&error=".$respuesta);
        exit();
    }
}

//Eliminar
if ($_POST["accion"] == "eliminar") {
    $reserva = new Reservacion(
    $_POST["nombre"], 
    "", 
    "", 
    "",
    $_POST["email"],
    $_POST["fecha"],
    $_POST["cantidad"]);

    $respuesta = $reserva->delete();

    if ($respuesta == "Ok") {
        header("location: ../reservar.php?cod=3");
        exit();
    }else{
        header("location: ../reservar.php?cod=4&error=".$respuesta);
        exit();
    }
}