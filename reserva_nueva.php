<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reservas.css">
    <title>Reservas</title>
    <?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("location: index.php?error=1");
        exit();
    }

    include "class/Reserva.php";
    ?>
</head>

<body class="body">
    <header>
        <h1>Reservaciones</h1>
    </header>


    <section class="contenedor contenido">

        <div class="h_ordenes">
            <h2>Nueva reserva</h2>
            <div class="b_ordenes">
                <a class="boton" href="reservas.php">Listado de reservas</a>
            </div>
        </div>

        <form class="form" action="controller/reserva.php" method="post">
            <legend>Datos de la reserva</legend>
            <div>
                <div class="form_campo">
                    <label for="nombre">Nombre del cliente:</label>
                    <input id="nombre" name="nombre" class="form_text" type="text" placeholder="Ingrese el nombre del cliente">
                </div>
                
                <div class="form_campo">
                    <label for="email">Email</label>
                    <input id="email" name="email" class="form_text" type="text" placeholder="Ingrese su email">
                </div>
                <div class="form_campo">
                    <label for="fecha">Fecha de la reserva</label>
                    <textarea class="date" name="fecha" id="fecha" placeholder="Ingrese la fecha de la reserva"></textarea>
                </div>
                <div class="form_campo">
                    <label for="cantidad">Cantidad de tiquetes a reservar</label>
                    <input id="cantidad" name="cantidad" class="form_text" type="number" placeholder="Ingrese la cantidad de tiquetes que desea">
                </div>

            </div>
            <div>
                <button class="boton enviar" name="accion" value="crear" type="submit">Crear</button>
            </div>
        </form>


    </section>

    <footer class="footer">
    <div class="footer_top">
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados
                    </p>

                    <br>
                    <br>

                    <section class="buttons">
                        <a href="https://www.facebook.com/facebook/" class="fa fa-facebook"></a>
                        <a href="https://twitter.com/?lang=en" class="fa fa-twitter"></a>
                        <a href="https://www.google.com/webhp?hl=en&sa=X&sqi=2&pjf=1&ved=0ahUKEwiHt-qAluuAAxWqfDABHRTVDYYQPAgI" class="fa fa-google-plus"></a>
                        <a href="https://www.youtube.com/" class="fa fa-youtube"></a>
                        <a href="https://www.linkedin.com/feed/" class="fa fa-linkedin"></a>
                    </section>

                </div>

            </div>
        </div>
    </div>
</footer>
</body>

</html>