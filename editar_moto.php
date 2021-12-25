<?php
include "cabecera.php";

$query = $conexion->prepare("SELECT * FROM motos
left join marcas on motos.id_marca = marcas.id_marca 
WHERE id_moto = ?  
limit 1");
$query->bind_param('s', $_GET['id_moto']);
$query->execute();
$result = $query->get_result();
$moto = $result->fetch_all(MYSQLI_ASSOC);
$query->close();

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Edita una Moto</h2>
            <h4 class="mt-4">Rellena el formulario para editar una moto</h4>
            <hr>
            <form action="editar.php" method="post">
                <div class="form-group">
                    <label for="nombre">Nº Bastidor</label>
                    <input type="text" name="id_moto" id="id_moto" value="<?= $moto[0]['id_moto'] ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="nombre">Matrícula</label>
                    <input type="text" name="matricula" id="matricula" value="<?= $moto[0]['matricula'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Marca</label>
                    <select class="form-control" name="id_marca" id="id_marca" required>
                        <option value="<?= $moto[0]['id_marca'] ?>" selected><?= $moto[0]['nombre_marca'] ?></option>
                        <?php
                        $query = $conexion->query("SELECT * FROM marcas");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="' . $valores['id_marca'] . '">' . $valores['nombre_marca'] . '</option>';
                        }
                        $query->close();
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre">Kilómetros</label>
                    <input type="text" name="kilometros" id="kilometros" value="<?= $moto[0]['kilometros'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Modelo</label>
                    <input type="text" name="modelo" id="modelo" value="<?= $moto[0]['modelo'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Precio</label>
                    <input type="text" name="precio" id="precio" value="<?= $moto[0]['precio'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Antigüedad (en meses)</label>
                    <input type="text" name="antiguedad" id="antiguedad" value="<?= $moto[0]['antiguedad'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Editar Moto">
                    <input type="hidden" name="editar" id="editar" class="form-control">
                    <input type="hidden" name="tipo" id="tipo" value="moto" class="form-control">
                    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
                </div>
            </form>
        </div>
    </div>
</div>