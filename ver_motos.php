<?php
include "cabecera.php";

$query = $conexion->prepare("SELECT * FROM motos
inner join marcas on motos.id_marca = marcas.id_marca");
$query->execute();
$result = $query->get_result();
$motos = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container">
    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
    <a href="crear_moto.php" class="btn btn-success">Añadir Moto</a>
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-3">Lista de Motos</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nº Bastidor</th>
                        <th>Matrícula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Kilómetros</th>
                        <th>Precio</th>
                        <th>Antiguedad</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($motos) > 0) {
                        foreach ($motos as $moto) {
                    ?>
                            <tr>
                                <td><?php echo $moto["id_moto"]; ?></td>
                                <td><?php echo $moto["matricula"]; ?></td>
                                <td><?php echo $moto["nombre_marca"]; ?></td>
                                <td><?php echo $moto["modelo"]; ?></td>
                                <td><?php echo $moto["kilometros"]; ?></td>
                                <td><?php echo $moto["precio"]; ?></td>
                                <td><?php echo $moto["antiguedad"]; ?></td>
                                <td><a href="editar_moto.php?id_moto=<?php echo $moto["id_moto"]; ?>" class="btn btn-light">🖊️ Editar</a></td>
                                <td>
                                    <form method="post" action="eliminar.php">
                                        <input type="hidden" name="id_moto" id="id_moto" value="<?php echo $moto["id_moto"]; ?>">
                                        <input type="hidden" name="eliminar" id="eliminar" value="eliminar">
                                        <input type="hidden" name="tipo" id="tipo" value="moto">
                                        <input type="submit" class="btn btn-danger" value="❌ Eliminar">
                                    </form>
                                </td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                <tbody>
            </table>
        </div>
    </div>
</div>