<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="Css/estilos.css">

  <title>Registrarse e Iniciar Sesión</title>
</head>
<body>
  <div class="row ">
    <h1 class="htitulo">Registrarse</h1>
    <form class="register-form" action="registro.php" method="post">
      <div  class="col-md-6 textos">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" class="form-control"required>
      </div>
      <div  class="col-md-6">
        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" class="form-control" required>
      </div>
      <button class="submit-button" type="submit">Registrarse</button>
    </form>
  </div>


</body>

</html>

<?php
include "../class/Usuario.php"; // Asegúrate de incluir el archivo de la clase Usuario

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





