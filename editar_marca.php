<?php
include "cabecera.php";

$query = $conexion->prepare("SELECT * FROM marcas WHERE id_marca = ? limit 1");
$query->bind_param('s', $_GET['id_marca']);
$query->execute();
$result = $query->get_result();
$marca = $result->fetch_all(MYSQLI_ASSOC);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Edita una Marca</h2>
            <h4 class="mt-4">Rellena el formulario para editar la marca</h4>
            <hr>
            <form action="editar.php" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre de la marca</label>
                    <input type="hidden" name="id_marca" id="id_marca" value="<?= $marca[0]['id_marca'] ?>" class="form-control">
                    <input type="text" name="nombre_marca" id="nombre_marca" value="<?= $marca[0]['nombre_marca'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Editar Marca">
                    <input type="hidden" name="editar" id="editar" class="form-control">
                    <input type="hidden" name="tipo" id="tipo" value="marca" class="form-control">

                    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
                </div>
            </form>
        </div>
    </div>
</div>