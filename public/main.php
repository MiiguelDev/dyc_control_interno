<?php
include '../config/check_admin.php';

$is_admin = isUserAdmin();
?>

<!DOCTYPE html>
<html>

<head> <!-- Aquí puedes incluir tus archivos CSS o JS -->
</head>

<body>
    <?php if ($is_admin) : ?>
        <!-- Descomentar para pruebas -->
        <!-- <h1>Bienvenido Administrador</h1> -->
        <!-- Aquí puedes incluir contenido específico para el administrador -->
    <?php else : ?>
        <!-- <h1>Bienvenido Usuario</h1> -->
        <!-- Aquí puedes incluir contenido específico para los usuarios normales -->
    <?php endif; ?>

    <!-- Aquí puedes incluir más contenido que sea común para ambos, administradores y usuarios -->
    <?php include '../templates/header.php'; ?>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav pt-5">
                <p><a href="#">Mis ingresos</a></p>
                <p><a href="#">Mis salidas</a></p>
                <p><a href="#">Registro de mis servicios</a></p>
            </div>
            <div class="col-sm-8 text-left pt-4">
                <h1>Bienvenido</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <hr>
                <h3>Test</h3>
                <p>Lorem ipsum...</p>
            </div>
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p class="pt-4" >Contenido 1</p>
                </div>
                <div class="well">
                    <p class="pt-4" >Contenido 2</p>
                </div>
            </div>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>
</body>

</html>