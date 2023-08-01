<?php

session_start();
try {
    $con = new PDO("mysql:dbname=museos_db; host=localhost", "root", "");
    $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (\Throwable $th) {
    echo "No hay conexión con la base de datos" . $th-> getMessage();
}