<!doctype html>
<html lang="en">

<head>
    <title>Sistema Inventario DYC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
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

                if (isset($_POST['remember'])) {
                    setcookie('email', $email, time() + (86400 * 30), "/"); // Cookie válida por 30 días
                }

                header("Location: main.php");
                exit();
            } else {
                $loginError = 'Correo o contraseña inválidos';
            }
        } else {
            $loginError = 'Correo o contraseña inválidos';
        }
        $stmt->close();
    }
    $conn->close();
    ?>

<div class="container text-center">
    <?php if ($loginError) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $loginError; ?>
        </div>
    <?php endif; ?>
    <div class="my-4">
        <a href="../index.php" class="custom-button-back-login">Volver al login</a>
    </div>
</div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>