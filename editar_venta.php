<?php
include "cabecera.php";

$query = $conexion->prepare("SELECT * FROM ventas 
left join motos on motos.id_moto = ventas.id_moto 
left join clientes  on ventas.dni_cliente = clientes.dni_cliente
WHERE id_venta = ?
limit 1");
$query->bind_param('s', $_GET['id_venta']);
$query->execute();
$result = $query->get_result();
$venta = $result->fetch_all(MYSQLI_ASSOC);
$query->close();

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Editar una Venta</h2>
            <h4 class="mt-4">Rellena el formulario para editar una venta</h4>
            <hr>
            <form action="editar.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="id_venta" id="id_venta" value="<?= $venta[0]['id_venta'] ?>" class="form-control">
                    <label for="nombre">Moto</label>
                    <select class="form-control" name="id_moto" id="id_moto" required>
                        <option value="<?= $venta[0]['id_moto'] ?>" selected><?= $venta[0]['modelo'] ?></option>
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
                    <select class="form-control" name="dni_cliente" id="dni_cliente" required>
                        <?php
                        echo '<option selected value="' . $venta[0]['dni_cliente'] . '">' . $venta[0]['nombre'] . ' ' . $venta[0]['apellidos']  . '</option>';
                        $query = $conexion->query("SELECT * FROM clientes");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="' . $valores['dni_cliente'] . '">' . $valores['nombre'].' ' .$valores['apellidos'].' - DNI:  '.$valores['dni_cliente'] .'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Editar Venta">
                    <input type="hidden" name="editar" id="editar" class="form-control">
                    <input type="hidden" name="tipo" id="tipo" value="venta" class="form-control">
                    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
                </div>
            </form>
        </div>
    </div>
</div>