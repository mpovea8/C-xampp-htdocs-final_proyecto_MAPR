<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Iniciar Sesión</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>
    <?php
    // Se inicia la session y comprobamos si ya está iniciada para redirigir al index.php si no se muestra el formulario
    // y se comprueban los datos recibidos.
    session_start();
    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] = 'admin') {
        header("Location:index.php");
    }

    $mensaje = "";
    // Se comprueba el usuaro admin y password 12345
    if (isset($_POST['usuario']) && $_POST['usuario'] === 'admin' && isset($_POST['password']) && $_POST['password'] === '12345') {
        $_SESSION['usuario'] = 'admin';
        header("Location:index.php");
        // Si es inválido añade el error.
    } else if (isset($_POST['usuario']) && $_POST['usuario'] !== 'admin' && isset($_POST['password']) && $_POST['password'] !== '12345') {
        $mensaje = 'Error de acceso';
    }
    ?>
    <div class="container">
        <?php
        if ($mensaje != "") {
        ?>

            <div class="row">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $mensaje ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
            ?>


            <div class="col-md-12">
                <h2 class="mt-4">Iniciar Sesión</h2>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Iniciar Sesión">
                    </div>
                </form>
            </div>
            </div>
    </div>