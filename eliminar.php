<?php
include "cabecera.php";

$error = false;
$mensaje = '';

// Si se envía una marca, se elimina una marca
if (isset($_POST['eliminar']) && $_POST['tipo'] === 'marca') {

    $mensaje = 'La marca <strong>' . $_POST['nombre_marca'] . '</strong> se ha eliminado correctamente.';

    $query = $conexion->prepare("DELETE FROM marcas WHERE id_marca = ?");
    $query->bind_param('i', $_POST['id_marca']);
    $query->execute();

    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al eliminar la marca  <strong>' . $_POST['nombre_marca'] . '</strong>';
    }
    $query->close();
}

// Si se envía un cliente, se elimina un cliente
if (isset($_POST['eliminar']) && $_POST['tipo'] === 'cliente') {

    $mensaje = 'El cliente <strong>' . $_POST['nombre'] . ' ' . $_POST['apellidos'] . '</strong> se ha eliminado correctamente.';

    $query = $conexion->prepare("DELETE FROM clientes WHERE dni_cliente = ?");
    $query->bind_param('s', $_POST['dni_cliente']);
    $query->execute();


    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al eliminar el cliente <strong>' . $_POST['nombre'] . ' ' . $_POST['apellidos'] . '</strong>';
    }
    $query->close();
}

// Si se envía una moto, se elimina una moto
if (isset($_POST['eliminar']) && $_POST['tipo'] === 'moto') {

    $mensaje = 'La moto <strong>' . $_POST['id_moto'] . '</strong> se ha eliminado correctamente.';

    $query = $conexion->prepare("DELETE FROM motos WHERE id_moto = ?");
    $query->bind_param('s', $_POST['id_moto']);
    $query->execute();

    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al eliminar la moto <strong>' . $_POST['id_moto'] . '</strong>';
    }
    $query->close();
}

// Si se envía una venta, se elimina una venta
if (isset($_POST['eliminar']) && $_POST['tipo'] === 'venta') {

    $mensaje = 'La venta <strong>' . $_POST['id_venta'] . '</strong> se ha eliminado correctamente.';

    $query = $conexion->prepare("DELETE FROM ventas WHERE id_venta = ?");
    $query->bind_param('s', $_POST['id_venta']);
    $query->execute();

    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al eliminar la venta <strong>' . $_POST['id_venta'] . '</strong>';
    }
    $query->close();
}

if ($error === true) {
?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= $mensaje ?>
                    <p>Revisa los datos nuevamente</p>
                </div>
            </div>
        </div>
    <?php
} else if ($error === false) {
    ?>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <?= $mensaje ?>
                    </div>
                    <a class="btn btn-primary" href="index.php">Volver al inicio</a>
                </div>
            </div>
        <?php
    }
