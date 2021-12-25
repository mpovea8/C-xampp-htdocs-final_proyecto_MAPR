<?php
include "cabecera.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Añade una Moto</h2>
            <h4 class="mt-4">Rellena el formulario para añadir una moto</h4>
            <hr>
            <form action="crear.php" method="post">
                <div class="form-group">
                    <label for="nombre">Nº Bastidor</label>
                    <input type="text" name="id_moto" id="id_moto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Matrícula</label>
                    <input type="text" name="matricula" id="matricula" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Marca</label>
                    <select class="form-control" name="id_marca" id="id_marca" required>
                        <option value="0" disabled>Seleccione:</option>
                        <?php
                        $query = $conexion->query("SELECT * FROM marcas");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="' . $valores['id_marca'] . '">' . $valores['nombre_marca'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre">Kilómetros</label>
                    <input type="text" name="kilometros" id="kilometros" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Modelo</label>
                    <input type="text" name="modelo" id="modelo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Precio</label>
                    <input type="text" name="precio" id="precio" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Antigüedad (en meses)</label>
                    <input type="text" name="antiguedad" id="antiguedad" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Añadir Moto">
                    <input type="hidden" name="crear" id="crear" class="form-control">
                    <input type="hidden" name="tipo" id="tipo" value="motos" class="form-control">
                    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
                </div>
            </form>
        </div>
    </div>
</div>