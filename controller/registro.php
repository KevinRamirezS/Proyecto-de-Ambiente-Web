<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Css/estilos.css">

    <title>Registrarse e Iniciar Sesión</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h1 class="htitulo text-center">Registrarse</h1>
                <form class="register-form" action="registro.php" method="post">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña:</label>
                        <input type="password" id="clave" name="clave" class="form-control" required>
                    </div>
                    <button class="btn btn-primary submit-button" type="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include "../class/Usuario.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $existingUser = Usuario::getByUserName($usuario);

    if (!$existingUser) {
        $newUser = new Usuario(null, $usuario, $clave);
        $result = $newUser->create();

        if ($result === "Ok") {
            echo "Registro exitoso. Ahora puedes <a href='login.php'>iniciar sesión</a>.";
        } else {
            echo "Error al registrar el usuario: $result";
        }
    } else {
        echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
    }
}
?>