<?php
include "cabecera.php";

$query = $conexion->prepare("SELECT * FROM marcas");
$query->execute();
$result = $query->get_result();
$marcas = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container">
    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
    <a href="crear_marca.php" class="btn btn-success">Añadir Marca</a>
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-3">Lista de marcas</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($marcas) > 0) {
                        foreach ($marcas as $marca) {
                    ?>
                            <tr>
                                <td><?php echo $marca["id_marca"]; ?></td>
                                <td><?php echo $marca["nombre_marca"]; ?></td>
                                <td><a href="editar_marca.php?id_marca=<?php echo $marca["id_marca"]; ?>" class="btn btn-light">🖊️ Editar</a></td>
                                <td>
                                    <form method="post" action="eliminar.php">
                                        <input type="hidden" name="id_marca" id="id_marca" value="<?php echo $marca["id_marca"]; ?>">
                                        <input type="hidden" name="nombre_marca" id="nombre_marca" value="<?php echo $marca["nombre_marca"]; ?>">
                                        <input type="hidden" name="eliminar" id="eliminar" value="eliminar">
                                        <input type="hidden" name="tipo" id="tipo" value="marca">
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