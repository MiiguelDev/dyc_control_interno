<?php
// Parámetros de conexión a la base de datos
$host = '127.0.0.1';
$dbname = 'inventario_master_dyc';
$username = 'root';
$password = ''; // Asume que no hay contraseña para el usuario root
$port = 3306;

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Crear hash de contraseñas
$passwordAdminHash = password_hash("contraseña_admin", PASSWORD_DEFAULT);
$passwordUserHash = password_hash("contraseña_usuario", PASSWORD_DEFAULT);

// Preparar consulta para insertar el usuario administrador
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, password, es_admin) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $nombreAdmin, $apellidoAdmin, $emailAdmin, $passwordAdminHash, $isAdmin);

// Datos del usuario administrador
$nombreAdmin = 'NombreAdmin';
$apellidoAdmin = 'ApellidoAdmin';
$emailAdmin = 'admin@example.com';
$isAdmin = 1; // 1 para verdadero

$stmt->execute();

// Preparar consulta para insertar el usuario normal
$stmt->bind_param("ssssi", $nombreUser, $apellidoUser, $emailUser, $passwordUserHash, $isUser);

// Datos del usuario normal
$nombreUser = 'NombreUsuario';
$apellidoUser = 'ApellidoUsuario';
$emailUser = 'user@example.com';
$isUser = 0; // 0 para falso

$stmt->execute();

echo "Usuarios creados con éxito.";

$stmt->close();
$conn->close();
?>
