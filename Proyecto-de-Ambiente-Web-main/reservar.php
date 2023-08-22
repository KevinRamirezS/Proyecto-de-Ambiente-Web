<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Css/estilos.css">
  <?php
  session_start();
  if (!isset($_SESSION["login"])) {
      header("location: index.php?error=1");
      exit();
  }

  include "class/Reservacion.php";

  $reservar = Reservacion::getAll();
  ?>

  <title>Reservas</title>

  
  <?php

  session_start();
  if (!isset($_SESSION["login"])) {
    header("location: ingresar.php?error=1");
    exit();
  }
  ?>

</head>

<body>
  <h1 class="htitulo">Reserva en el Museo</h1>


  <div class="textos">
    <form action="procesar_reserva.php" method="POST">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required><br><br>
  </div>



  <div class="textos2">
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required><br><br>
  </div>



  <div class="textos3">
    <label for="fecha">Fecha de visita:</label>
    <input type="date" id="fecha" name="fecha" required><br><br>
  </div>



  <div class="textos4">
    <label for="cantidad">Cantidad de personas:</label>
    <input type="number" id="cantidad" name="cantidad" required><br><br>
  </div>

  <div class="container">

    <input class="boton1" type="submit" value="Enviar reserva">
  </div>
  </form>
</body>

</html>