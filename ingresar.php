
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="Css/style.css">
    <title>ElectroComp</title>

</head>
<body class="login">

    <section class="contenedor contenido">
        <form class="form-group" action="controller/login.php" method="post">
            <legend>Inicio de sección</legend>
            <div>
                <div class="form-group">
                    <label for="usuario">Correo:</label>
                    <input id="usuario" name="usuario" class="form_text" type="email" 
                    placeholder="Ingrese su usuario">
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input id="contrasena" name="contrasena" class="form_text" 
                    type="password" placeholder="Ingrese su contraseña">
                </div>
            </div>
            <div>
                <button class="boton enviar" type="submit">Ingresar</button>
            </div>
        </form>

        <?php
            if (isset($_GET["error"])) {
                switch ($_GET["error"]) {
                    case '1':
                        echo "<p class='text-tertiary'>* No autorizado</p>";
                        break;
                    case '2':
                        echo "<p class='text-tertiary'>* Se requiere usuario y contraseña</p>";
                        break;
                    case '3':
                        echo "<p class='text-tertiary'>* Credenciales invalidos</p>";
                        break;
                }
            }
        ?>
    </section>
</body>
</html>