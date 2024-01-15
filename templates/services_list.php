<?php

include '../config/get_services.php';

// Obtener los servicios
$servicios = obtenerServicios();

// var_dump($servicios);
?>

<!-- Código HTML y Bootstrap para mostrar la lista -->
<div class="services-list">
    <h3>Listado de Servicios</h3>
    <ul class="list-group">
        <?php foreach ($servicios as $servicio) : ?>
            <li class="list-group-item">
                <strong>ID Servicio:</strong> <?= $servicio['id']; ?><br>
                <strong>Categoría:</strong> <?= $servicio['categoria']; ?><br>
                <strong>Cliente:</strong> <?= $servicio['cliente']; ?><br>
                <strong>Descripción Breve:</strong> <?= $servicio['descripcionCorta']; ?><br>
                <strong>Descripción Completa:</strong> <?= $servicio['descripcionCompleta']; ?><br>
                <strong>Fecha de Servicio:</strong> <?= $servicio['fechaServicio']; ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
</div>