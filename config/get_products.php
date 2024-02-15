<?php

function obtenerProductos()
{
    include '../config/db.php';

    $query = "SELECT p.id, p.nombre, p.descripcion, c.nombre AS categoria, p.cantidad_disponible, p.precio_unitario,
              fi.fecha AS fecha_ingreso, f.nombre AS fabricante, e.nombre AS estado, u.ubicacion, i.url AS imagen, cb.codigo AS codigo_barras
              FROM productos p
              LEFT JOIN categorias c ON p.categoria_id = c.id
              LEFT JOIN fechas_ingreso fi ON p.fecha_ingreso_id = fi.id
              LEFT JOIN fabricantes f ON p.fabricante_id = f.id
              LEFT JOIN estados e ON p.estado_id = e.id
              LEFT JOIN ubicaciones u ON p.ubicacion_id = u.id
              LEFT JOIN imagenes i ON p.imagen_id = i.id
              LEFT JOIN codigos_barras cb ON p.codigo_barras_id = cb.id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $productos = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $productos;
    } else {
        return []; 
    }
}
