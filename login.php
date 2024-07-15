<?php
session_start();
require 'clases/conexionlogin.php'; // Incluye el archivo de conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usuario = verificarUsuario($email, $password);

    if ($usuario) {
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['rol'] = $usuario['rol']; // Guarda el rol del usuario en la sesión
        header('Location: vistamenu/menu.php');
        exit();
    } else {
        $error = "Credenciales incorrectas. Por favor, intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: 
                linear-gradient(135deg, rgba(106, 17, 203, 0.7), rgba(37, 117, 252, 0.7)),
                url('IMG/logo2.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            position: relative;
            z-index: 1;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            width: 100%;
            max-width: 900px;
            backdrop-filter: blur(10px);
        }
        .card-body {
            background: rgba(255, 255, 255, 0.8); /* Fondo blanco semi-transparente */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="./IMG/logo2.jpg" class="card-img" alt="Login Image">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h4 class="card-title text-center">Login</h4>
                        <form id="loginForm" action="login.php" method="POST">
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i> Correo</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock"></i> Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <?php if (isset($error)) { echo "<p class='text-danger'>$error</p>"; } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
