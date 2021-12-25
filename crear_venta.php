<?php
include "cabecera.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Añade una Venta</h2>
            <h4 class="mt-4">Rellena el formulario para añadir una venta</h4>
            <hr>
            <form action="crear.php" method="post">
                <div class="form-group">
                    <label for="nombre">Moto</label>
                    <select class="form-control" name="id_moto" id="id_moto" required>
                        <option value="0" disabled>Seleccione:</option>
                        <?php
                        $query = $conexion->query("SELECT 
                        motos.id_moto, 
                        motos.id_marca,
                        motos.matricula,
                        motos.modelo
                      FROM 
                        motos 
                        left join ventas ON motos.id_moto = ventas.id_moto 
                      WHERE 
                        ventas.id_moto IS NULL");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="' . $valores['id_moto'] . '">' . $valores['id_moto'] .' - '.$valores['matricula']. ' - ' .$valores['modelo']. '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre">Cliente</label>
                    <select class="form-control" name="id_cliente" id="id_cliente" required>
                        <option value="0" disabled>Seleccione:</option>
                        <?php
                        $query = $conexion->query("SELECT * FROM clientes");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="' . $valores['dni_cliente'] . '">' . $valores['nombre'].' ' .$valores['apellidos'].' - DNI:  '.$valores['dni_cliente'] .'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Añadir Venta">
                    <input type="hidden" name="crear" id="crear" class="form-control">
                    <input type="hidden" name="tipo" id="tipo" value="venta" class="form-control">
                    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
                </div>
            </form>
        </div>
    </div>
</div>