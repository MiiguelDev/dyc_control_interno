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
                <p><a class="disabled-link" href="#">Registro de mis servicios</a></p>
            </div>
            <div class="col-sm-8 text-left pt-4">
                <h1>Bienvenido 
                    <?php if ($is_admin) : ?> Administrador<?php endif; ?></h1>
                <p>Aca iran listados eventualmente los ultimos trabajos realizados de manera modular ordenados por fecha</p>
                <hr>
                <h3>Segundo bloque de contenido</h3>
                <p>Aca iran listados indicaciones generales que se hayan efectuado en la semana, ordenadas por fecha, hora y quien lo indico.</p>
            </div>
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p class="pt-4" >Contenido a especificar 1</p>
                </div>
                <div class="well">
                    <p class="pt-4" >Contenido a especificar 2</p>
                </div>
            </div>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>
</body>

</html>