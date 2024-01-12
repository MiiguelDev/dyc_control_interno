<?php

function obtenerServicios() {
    include '../config/db.php';

    // Consulta para obtener los servicios ordenados por fecha de manera descendente
    $query = "SELECT id, categoria, cliente, descripcionCorta, fechaServicio, descripcionCompleta FROM servicios ORDER BY fechaServicio ASC";
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

?>

