<?php
//Inicia la session y comprueba que el usuario sea admin
session_start();
if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] = 'admin') {
  include "config.php";
  echo "Usuario " . $_SESSION["usuario"] . " conectado.";
  echo '<br><a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>';
?>

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Concesionario</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  </head>

  <body>

  <?php
} else {
  header("Location:login.php");
}
  ?>