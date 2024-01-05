<?php 
session_start();

function isUserAdmin() {
    // Verificar si el usuario ha iniciado sesión. Si no, redirigir a la página de inicio de sesión.
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
        exit();
    }

    // Devuelve true si el usuario es administrador, de lo contrario false
    return $_SESSION['is_admin'] ?? false;
}
?>