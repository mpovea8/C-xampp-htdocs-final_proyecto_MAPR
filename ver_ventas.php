<?php
include "cabecera.php";

// Se hace la query necesaria para poder mostrar todos los datos que necesitamos en la tabla
$query = $conexion->prepare("SELECT 
ventas.id_venta,
clientes.nombre,
clientes.apellidos,
motos.id_moto,
motos.matricula,
marcas.nombre_marca,
motos.modelo,
motos.precio,
motos.antiguedad
FROM ventas
left join motos on ventas.id_moto=motos.id_moto
left join clientes on ventas.dni_cliente=clientes.dni_cliente
left join marcas on marcas.id_marca=motos.id_marca");
$query->execute();
$result = $query->get_result();
$ventas = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container">
    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
    <a href="crear_venta.php" class="btn btn-success">Añadir Venta</a>
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-3">Lista de Ventas</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Nº Bastidor</th>
                        <th>Matrícula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Antiguedad</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($ventas) > 0) {
                        foreach ($ventas as $venta) {
                    ?>
                            <tr>
                                <td><?php echo $venta["id_venta"]; ?></td>
                                <td><?php echo $venta["nombre"]; ?></td>
                                <td><?php echo $venta["apellidos"]; ?></td>
                                <td><?php echo $venta["id_moto"]; ?></td>
                                <td><?php echo $venta["matricula"]; ?></td>
                                <td><?php echo $venta["nombre_marca"]; ?></td>
                                <td><?php echo $venta["modelo"]; ?></td>
                                <td><?php echo $venta["precio"]; ?></td>
                                <td><?php echo $venta["antiguedad"]; ?></td>
                                <td><a href="editar_venta.php?id_venta=<?php echo $venta["id_venta"]; ?>" class="btn btn-light">🖊️ Editar</a></td>
                                <td>
                                    <form method="post" action="eliminar.php">
                                        <input type="hidden" name="id_venta" id="id_venta" value="<?php echo $venta["id_venta"]; ?>">
                                        <input type="hidden" name="eliminar" id="eliminar" value="eliminar">
                                        <input type="hidden" name="tipo" id="tipo" value="venta">
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