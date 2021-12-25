<?php
include "cabecera.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Añade un Cliente</h2>
            <h4 class="mt-4">Rellena el formulario para añadir un nuevo cliente</h4>
            <hr>
            <form action="crear.php" method="post">
                <div class="form-group">
                    <label for="nombre">DNI</label>
                    <input type="text" name="dni_cliente" id="dni_cliente" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Localidad</label>
                    <input type="text" name="localidad_cliente" id="localidad_cliente" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Nombre</label>
                    <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellidos_cliente" id="apellidos_cliente" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Edad</label>
                    <input type="text" name="edad_cliente" id="edad_cliente" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Añadir Cliente">
                    <input type="hidden" name="crear" id="crear" class="form-control">
                    <input type="hidden" name="tipo" id="tipo" value="clientes" class="form-control">
                    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
                </div>
            </form>
        </div>
    </div>
</div>