<?php
include '../config/check_admin.php';

$is_admin = isUserAdmin();
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Aquí puedes incluir tus archivos CSS o JS -->
    <?php if ($is_admin) { ?>
        <?php include '../templates/header_admin.php'; ?>
    <?php } else { ?>
        <?php include '../templates/header_user.php'; ?>
    <?php } ?>
</head>

<body>

    <div class="container-fluid text-center">
        <div class="row content">
            <!-- A implementar en el futuro -->
            <!-- <div class="col-sm-2 sidenav pt-5">
                <p><a href="#">Mis ingresos</a></p>
                <p><a href="#">Mis salidas</a></p>
                <p><a class="disabled-link" href="#">Registro de mis servicios</a></p>
            </div> -->
            <div class="col-sm-8 text-left pt-4">
                <h2>Bienvenido <?= $is_admin ? 'Administrador' : 'Usuario'; ?></h2>
                <p>Aca iran listados eventualmente los ultimos trabajos realizados del usuario de manera modular ordenados por fecha</p>
                <hr>
                <h3>Segundo bloque de contenido</h3>
                <p>Aca iran listados indicaciones generales que se hayan efectuado en la semana, ordenadas por fecha, hora y quien lo indico.</p>
            </div>
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p class="pt-4">Fecha actual con alguna indicacion del tiempo de las zonas en que se esta trabajando</p>
                </div>
                <div class="well">
                    <p class="pt-4">Contenido a agregar eventualmente, sin definir</p>
                </div>
            </div>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>
</body>

</html>