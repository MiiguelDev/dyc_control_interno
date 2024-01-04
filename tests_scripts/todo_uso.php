<?php 
$newPasswordHash = password_hash("admin", PASSWORD_DEFAULT);
// Usa este hash para actualizar la contraseña en la base de datos.
?>