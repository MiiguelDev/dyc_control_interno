<?php

include '../config/get_services.php';

// Obtener los servicios
$servicios = obtenerServicios();

?>

<!-- Código HTML y Bootstrap para mostrar la lista -->
<div class="services-list">
    <h3>Ultimos Servicios</h3>
    <ul class="list-group pt-1">
        <?php foreach ($servicios as $servicio) : ?>
            <li class="list-group-item mt-2">
                <strong>ID Servicio:</strong><?= $servicio['id_servicio']; ?><br>
                <strong>Cliente:</strong> <?= $servicio['cliente']; ?><br>
                <strong>Lugar de Trabajo:</strong> <?= $servicio['lugarTrabajo']; ?><br>
                <strong>Descripción Breve:</strong> <?= $servicio['descripcionCorta']; ?><br>
                <strong>Fecha de Servicio:</strong> <?= date('d - m  - Y', strtotime($servicio['fechaServicio'])); ?><br>
                <strong>Trabajador:</strong> <?= $servicio['nombre_trabajador'] . ' ' . $servicio['apellido_trabajador']; ?><br>
                <a href="../templates/services_list_detail.php?id=<?= $servicio['id_servicio']; ?>" class="btn btn-primary">Ver detalles</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>





