<?php

function obtenerServicios()
{
    include '../config/db.php';

    // Consulta para obtener los servicios con nombre y apellido del trabajador
    $query = "SELECT 
                s.id AS id_servicio,
                c.nombreCategoria AS categoria,
                cl.nombreCliente AS cliente,
                lt.nombreLugarTrabajo AS lugarTrabajo,
                s.descripcionCorta,
                s.fechaServicio,
                s.descripcionCompleta,
                t.nombre AS nombre_trabajador,
                t.apellido AS apellido_trabajador
                FROM servicios s
                JOIN categorias c ON s.categoriaId = c.categoriaId
                JOIN clientes cl ON s.clienteId = cl.clienteId
                JOIN lugaresTrabajo lt ON s.lugarTrabajoId = lt.lugarTrabajoId
                JOIN servicioTrabajador st ON s.id = st.servicioId
                JOIN trabajadores t ON st.trabajadorId = t.trabajadorId
                ORDER BY s.fechaServicio DESC LIMIT 5";

    $result = mysqli_query($conn, $query);

    // Verificar si hubo errores en la consulta
    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    // Verificar si se obtuvieron resultados
    if (mysqli_num_rows($result) > 0) {
        $servicios = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $servicios;
    } else {
        return []; // Devolver un array vacío si no hay resultados
    }
}
