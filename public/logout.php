<?php
session_start();

// Vaciar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redireccionar al usuario a index.php en la raíz
header("Location: ../index.php");
exit;
?>
