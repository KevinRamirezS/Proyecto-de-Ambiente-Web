
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="Css/style.css">
    <title>Iniciar Sesion</title>

</head>
<body >

    <section class="contenedor contenido">
        <div class="container">
        <form class="form-group" action="controller/login.php" method="post">
        <br><h1 class="htitulo" style="text-align: center;">Inicio de Sesión</h1>
            <div>
                <div class="mb-3">
                    <label for="usuario">Correo:</label>
                    <input id="usuario" name="usuario"  class="form-control" type="email" 
                    placeholder="Ingrese su correo">
                </div>
                <div class="mb-3">
                    <label for="contrasena">Contraseña:</label>
                    <input id="contrasena" name="contrasena"  class="form-control"
                    type="password" placeholder="Ingrese su contraseña">
                </div>
            </div>
            <div >
                <button class="btn btn-primary " type="submit">Iniciar Sesión</button>
                <a href="controller/registro.php" class="btn btn-primary">Registrarse</a>

            </div>
        </form>
        </div>

        <?php
            if (isset($_GET["error"])) {
                switch ($_GET["error"]) {
                    case '1':
                        echo "<p style='text-align: center;' class='text-tertiary'>Debe iniciar sesion</p>";
                        break;
                    case '2':
                        echo "<p style='text-align: center;' class='text-tertiary'>* Se requiere usuario y contraseña</p>";
                        break;
                    case '3':
                        echo "<p style='text-align: center;' class='text-tertiary'>* Credenciales invalidos</p>";
                        break;
                }
            }
        ?>
    </section>
</body>
</html>