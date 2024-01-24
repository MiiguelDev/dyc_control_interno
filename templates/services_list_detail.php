<?php
include '../config/get_services.php';
include '../config/check_admin.php';

// Obtener el ID del servicio si está presente en la URL
$id_servicio = isset($_GET['id']) ? $_GET['id'] : null;

// Obtener los servicios
$servicios = obtenerServicios($id_servicio);

// Verificar si el usuario es admin
$is_admin = isUserAdmin();

// Incluir el encabezado correspondiente
if ($is_admin) {
    include '../templates/header_admin.php';
} else {
    include '../templates/header_user.php';
}
?>


<!-- Código HTML y Bootstrap para mostrar la lista -->
<div class="services-list">
    <h3 class="pt-4 text-center">Detalle del Servicio Numero <?php $servicio['id_servicio']; ?> </h3>
    <ul class="list-group pt-1">
        <?php foreach ($servicios as $servicio) : ?>
            <li class="list-group-item mt-2">
                <strong>ID Servicio:</strong> <?= $servicio['id_servicio']; ?><br>
                <strong>Categoría:</strong> <?= $servicio['categoria']; ?><br>
                <strong>Cliente:</strong> <?= $servicio['cliente']; ?><br>
                <strong>Lugar de Trabajo:</strong> <?= $servicio['lugarTrabajo']; ?><br>
                <strong>Descripción Breve:</strong> <?= $servicio['descripcionCorta']; ?><br>
                <strong>Descripción Completa:</strong> <?= $servicio['descripcionCompleta']; ?><br>
                <strong>Fecha de Servicio:</strong> <?= date('d - m  - Y', strtotime($servicio['fechaServicio'])); ?><br>
                <strong>Trabajador:</strong> <?= $servicio['nombre_trabajador'] . ' ' . $servicio['apellido_trabajador']; ?><br>
                <a href="../index.php" class="btn btn-primary">Volver</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php include '../templates/footer.php'; ?>
