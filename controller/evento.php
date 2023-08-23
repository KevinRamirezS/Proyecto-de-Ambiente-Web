<?php
include "../class/Evento.php";

if (!isset($_POST["nombre"])) {
    header("location: ../index.php");
    exit();
}

// VALIDACION DE LOS DATOS


// CREAR
$evento = new Evento(0, 
$_POST["nombre"], 
$_POST["descripcion"], 
$_POST["duracion"]
);

$respuesta = $evento->create();

if ($respuesta == "Ok") {
    header("location: ../index.php?cod=1");
    exit();
}else{
    header("location: ../index.php?cod=4&error=".$respuesta);
    exit();
}