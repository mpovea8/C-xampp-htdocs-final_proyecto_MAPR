<?php
//Datos de configuración de mysql y uso de utf8 para que se muestren los acentos y ñ
$usuario = "root";
$password = "iaw";
$db = "concesionario_online";

$conexion = mysqli_connect('localhost', $usuario, $password, $db);
$conexion->set_charset('utf8');