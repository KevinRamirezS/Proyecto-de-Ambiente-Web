<?php
include "../class/Reserva.php";

if (!isset($_POST["accion"])) {
    header("location: ../reservas.php");
    exit();
}

// VALIDACIÓN DE LOS DATOS

// CREAR
if ($_POST["accion"] == "crear") {
    $reserva = new Reserva(0, 
    $_POST["nombre"], 
    $_POST["email"], 
    $_POST["fecha"],
    $_POST["cantidad"]);

    $respuesta = $reserva->create();

    if ($respuesta == "Ok") {
        header("location: ../reservas.php?cod=1");
        exit();
    } else {
        header("location: ../reservas.php?cod=4&error=".$respuesta);
        exit();
    }
}

// Editar
if ($_POST["accion"] == "editar") {
    $reserva = new Reserva(
    $_POST["id"], 
    $_POST["nombre"], 
    $_POST["email"], 
    $_POST["fecha"],
    $_POST["cantidad"]);

    $respuesta = $reserva->update();

    if ($respuesta == "Ok") {
        header("location: ../reservas.php?cod=2");
        exit();
    } else {
        header("location: ../reservas.php?cod=4&error=".$respuesta);
        exit();
    }
}

// Eliminar
if ($_POST["accion"] == "eliminar") {
    $reserva = new Reserva(
    $_POST["id"], 
    "", 
    "", 
    "",
    "");

    $respuesta = $reserva->delete();

    if ($respuesta == "Ok") {
        header("location: ../reservas.php?cod=3");
        exit();
    } else {
        header("location: ../reservas.php?cod=4&error=".$respuesta);
        exit();
    }
}
?>
