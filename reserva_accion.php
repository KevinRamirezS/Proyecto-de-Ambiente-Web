<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reservas.css">
    <?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("location: index.php?error=1");
        exit();
    }

    include "class/Reserva.php";

    if (!isset($_GET["id"]) or !isset($_GET["accion"])) {
        header("location: reservas.php");
        exit();
    }

    $reserva = Reserva::getById($_GET["id"]);

    if (!$reserva) {
        header("location: reservas.php");
        exit();
    }
    ?>
</head>

<body>
    <section class="contenedor contenido">

        <div class="h_ordenes">

            <?php
            if ($_GET["accion"] == "1") {
                echo "<h2>Editar reserva</h2>";
            } else {
                echo "<h2>Eliminar reserva</h2>";
            }
            ?>

            <div class="b_ordenes">
                <a class="boton" href="reservas.php">Listado de reservas</a>
            </div>
        </div>

        <form class="form" action="controller/reserva.php" method="post">
            <legend>Datos de la reserva</legend>
            <div>
                <div class="form_campo">
                    <input value="<?php echo $reserva->getId() ?>" name="id" type="hidden">
                </div>
                <div class="form_campo">
                    <label for="nombre">Nombre del cliente:</label>
                    <input id="nombre" value="<?php echo $reserva->getNombre() ?>" name="nombre" class="form_text" type="text" placeholder="Ingrese el nombre del cliente" <?php echo $reserva->accion($_GET["accion"]) ?>>
                </div>

                <div class="form_campo">
                    <label for="email">Email</label>
                    <input id="email" value="<?php echo $reserva->getEmail() ?>" name="email" class="form_text" type="text" placeholder="Ingrese su email" <?php echo $reserva->accion($_GET["accion"]) ?>>
                </div>
                <div class="form_campo">
                    <label for="fecha">Fecha de la reserva</label>
                    <textarea class="date" value="<?php echo $reserva->getFecha() ?>" name="fecha" id="fecha" placeholder="Ingrese la fecha de la reserva" <?php echo $reserva->accion($_GET["accion"]) ?>></textarea>
                </div>

                <div class="form_campo">
                    <label for="cantidad">Cantidad de tiquetes</label>
                    <textarea class="number" name="cantidad" id="problema" placeholder="Ingrese la cantidad de tiquetes que desea" <?php echo $reserva->accion($_GET["accion"]) ?>><?php echo $reserva->getCantidad() ?></textarea>
                </div>
            </div>
            <div>

                <?php
                if ($_GET["accion"] == "1") {
                    echo '<button class="boton enviar" name="accion" value="editar" type="submit">Actualizar</button>';
                } else {
                    echo '<button class="boton enviar" name="accion" value="eliminar" type="submit">Eliminar</button>';
                }
                ?>

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