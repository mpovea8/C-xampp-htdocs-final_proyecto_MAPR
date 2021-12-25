<?php
include "cabecera.php";

// Carga listado de clientes, se genera la tabla en html y el bucle recorre todos los datos que se reciben
$query = $conexion->prepare("SELECT * FROM clientes");
$query->execute();
$result = $query->get_result();
$clientes = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container">
    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
    <a href="crear_cliente.php" class="btn btn-success">Añadir Cliente</a>
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-3">Lista de Clientes</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Ciudad</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($clientes) > 0) {
                        foreach ($clientes as $cliente) {
                    ?>
                            <tr>
                                <td><?php echo $cliente["dni_cliente"]; ?></td>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["apellidos"]; ?></td>
                                <td><?php echo $cliente["localidad"]; ?></td>
                                <td><a href="editar_cliente.php?dni_cliente=<?php echo $cliente["dni_cliente"]; ?>" class="btn btn-light">🖊️ Editar</a></td>
                                <td>
                                    <form method="post" action="eliminar.php">
                                        <input type="hidden" name="dni_cliente" id="dni_cliente" value="<?php echo $cliente["dni_cliente"]; ?>">
                                        <input type="hidden" name="nombre" id="nombre" value="<?php echo $cliente["nombre"]; ?>">
                                        <input type="hidden" name="apellidos" id="apellidos" value="<?php echo $cliente["apellidos"]; ?>">
                                        <input type="hidden" name="eliminar" id="eliminar" value="eliminar">
                                        <input type="hidden" name="tipo" id="tipo" value="cliente">
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