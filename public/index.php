<?php
session_start();
include '../config/db.php';

// Debugging, descomentar para testeos y pruebas
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// var_dump($_POST);

$loginError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, nombre, apellido, password, es_admin FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Debugging
        // var_dump($password);
        // var_dump($user['password']);
        // var_dump(password_verify($password, $user['password']));

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_admin'] = $user['es_admin'];

            // Si el usuario eligió "Recordar Contraseña", establecer una cookie para el email
            if (isset($_POST['remember'])) {
                setcookie('email', $email, time() + (86400 * 30), "/"); // Cookie válida por 30 días
            }

            header("Location: main.php");
            exit();
        } else {
            $loginError = 'Invalid email or password';
        }
    } else {
        $loginError = 'Invalid email or password';
    }
    $stmt->close();
}
$conn->close();

if ($loginError) {
    echo $loginError;
}
?>

