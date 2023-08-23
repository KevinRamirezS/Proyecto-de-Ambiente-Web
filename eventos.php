<section class="contenedor contenido">

    <div class="b_eventos">
        <a class="boton" href="evento_nuevo.php">Nuevo Evento</a>
    </div>

<?php

include "class/Evento.php";

$eventos = Evento::getAll();
?>




<?php if (empty($eventos)) {  ?>

    <div>
        <p class="text-primary">No hay eventos programados para los museos.</p>
    </div>

<?php } else { ?>

    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Duracion</th>
            </tr>
        </thead>

        <tbody>
            <?php

            foreach ($eventos as $evento) {
                echo "<tr>";
                echo "<td>" . $evento->getCodigo() . "</td>";
                echo "<td>" . $evento->getNombre() . "</td>";
                echo "<td>" . $evento->getDescripcion() . "</td>";
                echo "<td>" . $evento->getDuracion() . "</td>";
                echo "</tr>";
            }
            ?>

        </tbody>

    </table>

<?php } ?>


<?php

if (isset($_GET["cod"])) {
    if ($_GET["cod"] == "1") { // CREADO
        echo "<p class='text-primary'>Evento agrgada con exito</p>";
    }
    if ($_GET["cod"] == "4") { // ERROR
        echo "<p class='text-tertiary'>" . $_GET["error"] . "</p>";
    }
}

?>

</section>