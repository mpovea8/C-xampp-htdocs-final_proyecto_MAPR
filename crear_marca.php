<?php
include "cabecera.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Añade una Marca</h2>
            <h4 class="mt-4">Rellena el formulario para añadir una nueva Marca</h4>
            <hr>
            <form action="crear.php" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre de la marca</label>
                    <input type="text" name="nombre_marca" id="nombre_marca" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Añadir Marca">
                    <input type="hidden" name="crear" id="crear" class="form-control">
                    <input type="hidden" name="tipo" id="tipo" value="marcas" class="form-control">
                    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
                </div>
            </form>
        </div>
    </div>
</div>