<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Css/estilos.css">
  <link rel="stylesheet" href="Css/style.css">


  <title>Registrarse</title>
</head>

<body>

  <div class="container ">

    <form action="registro.php" method="post">
      <br>
      <h1  style="text-align: center;">Registrarse</h1>

      <div>
        <div class="mb-3">
          <label for="usuario">Correo:</label>
          <input id="usuario" name="usuario" class="form-control" type="email" placeholder="Ingrese su correo">
        </div>
        <div class="mb-3">
          <label for="contrasena">Contraseña:</label>
          <input id="contrasena" name="contrasena" class="form-control" type="password" placeholder="Ingrese su contraseña">
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Registrarse</button>
      <a href="../ingresar.php" class="btn btn-primary">Iniciar Sesión</a>

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
      echo '<div class="text-center">';
      echo '<h6>Registro exitoso</h6>';
      echo '<a href="login.php" class="btn btn-success">Iniciar sesión</a>';
      echo '</div>';
    } else {
      echo "Error al registrar el usuario: $result";
    }
  } else {
    echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
  }
}
?>