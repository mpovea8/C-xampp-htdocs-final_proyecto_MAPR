<?php
include "cabecera.php";

/* Se recuperan los datos de la base de datos con el dni que se recibe por get
 y se añaden a los valores del formulario con para editar los campos necesarios, 
 también se envían dos parámetros por post para poder identificar qué tipo se va a editar */
$query = $conexion->prepare("SELECT * FROM clientes WHERE dni_cliente = ? limit 1");
$query->bind_param('s', $_GET['dni_cliente']);
$query->execute();
$result = $query->get_result();
$marca = $result->fetch_all(MYSQLI_ASSOC);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Editar un Cliente</h2>
            <h4 class="mt-4">Rellena el formulario para editar el cliente</h4>
            <hr>
            <form action="editar.php" method="post">
                <div class="form-group">
                    <label for="nombre">DNI</label>
                    <input type="text" name="dni_cliente" id="dni_cliente" value="<?= $marca[0]['dni_cliente'] ?>" class="form-control" required readonly>
                </div>
                <div class="form-group">
                    <label for="apellido">Localidad</label>
                    <input type="text" name="localidad_cliente" id="localidad_cliente" value="<?= $marca[0]['localidad'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Nombre</label>
                    <input type="text" name="nombre_cliente" id="nombre_cliente" value="<?= $marca[0]['nombre'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellidos_cliente" id="apellidos_cliente" value="<?= $marca[0]['apellidos'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Edad</label>
                    <input type="text" name="edad_cliente" id="edad_cliente" value="<?= $marca[0]['edad'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Editar Cliente">
                    <input type="hidden" name="editar" id="editar" class="form-control">
                    <input type="hidden" name="tipo" id="tipo" value="cliente" class="form-control">
                    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
                </div>
            </form>
        </div>
    </div>
</div>