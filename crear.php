<?php
include "cabecera.php";

// Se inicia un error a falso y un mensaje vacio para luego sobreescribirlo dependiendo de la operación y el resultado.
$error = false;
$mensaje = '';

// Si se envía una marca, se añade una marca
if (isset($_POST['crear']) && $_POST['tipo'] === 'marcas') {


    $mensaje = 'La marca <strong>' . $_POST['nombre_marca'] . '</strong> se ha añadido correctamente.';
    // Se prepara la consulta para evitar que haya código que pueda alterar la base de datos.
    $query = $conexion->prepare("INSERT INTO marcas (nombre_marca) VALUES (?)");
    $query->bind_param('s', $_POST['nombre_marca']);
    $query->execute();

    // Cuenta las filas afectadas para comprobar si se ha ejecutado bien o no.
    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al añadir la marca  <strong>' . $_POST['nombre_marca'] . '</strong>';
    }
    $query->close();
}

// Si se envía un cliente, se añade una cliente
if (isset($_POST['crear']) && $_POST['tipo'] === 'clientes') {

    $mensaje = 'El cliente <strong>' . $_POST['nombre_cliente'] . ' ' . $_POST['apellidos_cliente'] . '</strong> se ha añadido correctamente.';

    $query = $conexion->prepare("INSERT INTO clientes (dni_cliente, localidad, nombre, apellidos, edad) 
        VALUES (?, ?, ?, ?, ?)");
    $query->bind_param(
        'ssssi',
        $_POST['dni_cliente'],
        $_POST['localidad_cliente'],
        $_POST['nombre_cliente'],
        $_POST['apellidos_cliente'],
        $_POST['edad_cliente']
    );
    $query->execute();

    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al añadir el cliente <strong>' . $_POST['nombre_cliente'] . ' ' . $_POST['apellidos_cliente'] . '</strong>';
    }
    $query->close();
}

// Si se envía una moto, se añade una moto
if (isset($_POST['crear']) && $_POST['tipo'] === 'motos') {

    $mensaje = 'La moto <strong>' . $_POST['id_moto'] . '</strong> se ha añadido correctamente.';

    $query = $conexion->prepare("INSERT INTO motos 
        (id_moto, id_marca, kilometros, modelo, precio, antiguedad, matricula) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param(
        'sisssis',
        $_POST['id_moto'],
        $_POST['id_marca'],
        $_POST['kilometros'],
        $_POST['modelo'],
        $_POST['precio'],
        $_POST['antiguedad'],
        $_POST['matricula']
    );
    $query->execute();

    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al añadir la moto  <strong>' . $_POST['id_moto'] . '</strong>';
    }
    $query->close();
}

// Si se envía una venta, se añade una venta
if (isset($_POST['crear']) && $_POST['tipo'] === 'venta') {

    $mensaje = 'La venta de la moto <strong>' . $_POST['id_moto'] . '</strong> se ha añadido correctamente.';

    $query = $conexion->prepare("INSERT INTO ventas 
        (id_moto, dni_cliente) 
        VALUES (?, ?)");

    $query->bind_param(
        'ss',
        $_POST['id_moto'],
        $_POST['id_cliente']
    );
    $query->execute();

    if (mysqli_affected_rows($conexion) <= 0) {
        $error = true;
        $mensaje = 'Ha habido un problema al añadir la venta de la moto  <strong>' . $_POST['id_moto'] . '</strong> al cliente <strong>' . $_POST['id_cliente'] . '</strong>';
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
