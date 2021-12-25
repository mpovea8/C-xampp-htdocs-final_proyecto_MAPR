<?php
include "cabecera.php";

$error = false;
$mensaje = '';

// Si se envía una marca, se edita una marca
if (isset($_POST['editar']) && $_POST['tipo'] === 'marca') {

    $mensaje = 'La marca <strong>' . $_POST['nombre_marca'] . '</strong> se ha editado correctamente.';
    $query = $conexion->prepare("UPDATE marcas SET nombre_marca = ? WHERE id_marca = ?");
    $query->bind_param('si', $_POST['nombre_marca'], $_POST['id_marca']);
    $query->execute();

    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al editar la marca  <strong>' . $_POST['nombre_marca'] . '</strong>';
    }
    $query->close();
}

// Si se envía un cliente, se edita un cliente
if (isset($_POST['editar']) && $_POST['tipo'] === 'cliente') {

    $mensaje = 'El cliente <strong>' . $_POST['nombre_cliente'] . ' ' . $_POST['apellidos_cliente'] . '</strong> se ha editado correctamente.';
    $query = $conexion->prepare("UPDATE clientes SET localidad = ?, nombre = ?, apellidos = ?, edad = ? WHERE dni_cliente = ?");
    $query->bind_param(
        'sssis',
        $_POST['localidad_cliente'],
        $_POST['nombre_cliente'],
        $_POST['apellidos_cliente'],
        $_POST['edad_cliente'],
        $_POST['dni_cliente']
    );
    $query->execute();

    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al editar el cliente <strong>' . $_POST['nombre_cliente'] . ' ' . $_POST['apellidos_cliente'] . '</strong>';
    }
    $query->close();
}

// Si se envía una moto, se edita una moto
if (isset($_POST['editar']) && $_POST['tipo'] === 'moto') {

    $mensaje = 'El la moto con número de bastidor <strong>' . $_POST['id_moto'] . '</strong> se ha editado correctamente.';
    $query = $conexion->prepare("UPDATE motos SET id_marca = ?, kilometros = ?, modelo = ?, precio = ?, antiguedad = ? WHERE id_moto = ?");
    $query->bind_param(
        'isssis',
        $_POST['id_marca'],
        $_POST['kilometros'],
        $_POST['modelo'],
        $_POST['precio'],
        $_POST['antiguedad'],
        $_POST['id_moto']
    );
    $query->execute();

    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al editar la moto <strong>' . $_POST['id_moto'] . '</strong>';
    }
    $query->close();
}

// Si se envía una venta, se edita una venta
if (isset($_POST['editar']) && $_POST['tipo'] === 'venta') {
    $mensaje = 'La venta de la moto <strong>' . $_POST['id_moto'] . '</strong> se ha editado correctamente.';

    $query = $conexion->prepare("UPDATE ventas SET id_moto = ?, dni_cliente = ? WHERE id_venta = ?");
    $query->bind_param(
        'ssi',
        $_POST['id_moto'],
        $_POST['dni_cliente'],
        $_POST['id_venta']
    );
    $query->execute();

    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema con la venta de la moto <strong>' . $_POST['id_moto'] . '</strong>';
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
