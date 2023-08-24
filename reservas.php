<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reservas.css"> <!-- Enlaza tu archivo CSS aquí -->
    <title>Reservas</title>
    <?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: index.php?error=1");
        exit();
    }

    include "class/Reserva.php";

    $reservas = Reserva::getAll();
    ?>
</head>

<body>
    <section class="contenedor contenido">
        <div class="h_ordenes">
            <div class="b_ordenes">
                <a class="form-message" href="reserva_nueva.php">Nueva reserva</a>
            </div>
        </div>

        <?php if (empty($reservas)) {  ?>
            <div>
                <p class="text-primary">No hay reservas en el sistema.</p>
            </div>
        <?php } else { ?>
            <table class="form-container">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($reservas as $reserva) {
                        echo "<tr>";
                        echo "<td>" . $reserva->getId() . "</td>";
                        echo "<td>" . $reserva->getNombre() . "</td>";
                        echo "<td>" . $reserva->getEmail() . "</td>";
                        echo "<td>" . $reserva->getFecha() . "</td>";
                        echo "<td>" . $reserva->getCantidad() . "</td>";
                        echo "<td>";
                        echo '<a class="boton" href="reserva_accion.php?accion=1&numero=' . $reserva->getId() . '">Editar</a>';
                        echo "<br><br><br>";
                        echo '<a class="boton" href="reserva_accion.php?accion=2&numero=' . $reserva->getId() . '">Eliminar</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>

        <?php
        if (isset($_GET["cod"])) {
            if ($_GET["cod"] == "1") {
                echo "<p class='text-primary'>Reserva agregada con éxito</p>";
            }
            if ($_GET["cod"] == "2") {
                echo "<p class='text-primary'>Reserva actualizada con éxito</p>";
            }
            if ($_GET["cod"] == "3") {
                echo "<p class='text-primary'>Reserva eliminada con éxito</p>";
            }
            if ($_GET["cod"] == "4") {
                echo "<p class='text-tertiary'>" . $_GET["error"] . "</p>";
            }
        }
        ?>
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

