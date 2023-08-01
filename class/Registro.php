<?php 

include_once("Conexion.php");
include_once("Cuenta.php");

$newCuenta = new Cuenta($con);

if(isset($_POST["submitButton"])){
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    $listo =$newCuenta->registrar($nombre, $correo, $clave);
    
    if($listo){
        ob_start();
        header("Location: ../index.html");
        exit();
    }else {
       echo "anda algo mal";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de inicio de sesión</title>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../Css/estilos.css">
</head>
<body>
    <h2 class="htitulo">Registrarse</h2>
    <form action="registro.php" method="post">

    <div class="textos" >
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" >
    </div>
    <br>

    <div class="textos" >
        <label for="correo">Correo electrónico:</label>
        <input type="correo" id="correo" name="correo" >
    </div>
    <br>
    <div class="textos" >
        <label for="clave">Clave:</label>
        <input type="clave" id="clave" name="clave" >
    </div>
    <br>
    <div class="container">
        <input class="boton1 " type="submit" value="Iniciar sesión" name="submitButton">
    </div>
    <br>
    </form>
</body>
</html>
