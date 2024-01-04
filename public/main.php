<?php
session_start();

// Verificar si el usuario ha iniciado sesión. Si no, redirigir a la página de inicio de sesión.
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Comprobar si el usuario es administrador o usuario normal
$is_admin = $_SESSION['is_admin'] ?? false;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <!-- Aquí puedes incluir tus archivos CSS o JS -->
</head>
<body>
    <?php if ($is_admin): ?>
        <h1>Bienvenido Administrador</h1>
        <!-- Aquí puedes incluir contenido específico para el administrador -->
    <?php else: ?>
        <h1>Bienvenido Usuario</h1>
        <!-- Aquí puedes incluir contenido específico para los usuarios normales -->
    <?php endif; ?>

    <!-- Aquí puedes incluir más contenido que sea común para ambos, administradores y usuarios -->
</body>
</html>
