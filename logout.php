<?php
// carga la session, desvincula el usuario y redirige al login.php
session_start();
unset($_SESSION["usuario"]);
header("Location:login.php");
