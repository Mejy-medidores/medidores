<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Redirigir a la página de login si no está autenticado
    header('Location: ../index.php'); // Cambia esto a la ruta de tu archivo de login
    exit();
}

$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : ''; // Asegúrate de que la clave 'rol' esté definida

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Menu</title>
    <link rel="stylesheet" href="estiloMenu.css">
    <style>
        body {
            padding-top: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #001d5c;
            padding: 10px 20px;
        }
        .header h1 {
            margin: 0;
        }
        .header .user-area {
            display: flex;
            align-items: center;
        }
        .header .user-area span {
            margin-left: 10px;
        }
        .card {
            margin-bottom: 10px;
        }
        .card img {
            height: 80px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>___________________Caev || MEJY Modulo 2______________</h1>
        <div class="user-area dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo htmlspecialchars($_SESSION['email']); ?>
            </button>
            <span class="mr-2">
                <i class="fas fa-user-circle fa-2x"></i>
            </span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item logout-btn" onclick="logout()">Cerrar Sesión</button>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
            <?php if ($rol === 'admin'): ?>
            <div class="col">
                <div class="card">
                    <img src="https://equysis.com/images/contenido/medidorchorromultipleplastico420200408165700.jpg" class="card-img-top" alt="Medidores de entrada"/>
                    <div class="card-body">
                        <h5 class="card-title">Medidores</h5>
                        <a href="../vistas2/medidores_entrantes.php" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://equysis.com/images/contenido/medidorchorromultipleplastico420200408165700.jpg" class="card-img-top" alt="Medidores de salida"/>
                    <div class="card-body">
                        <h5 class="card-title">Medidores salientes</h5>
                        <a href="../vistas/medidores.php" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://w7.pngwing.com/pngs/288/840/png-transparent-computer-icons-user-crowd-social-group-others-miscellaneous-monochrome-social-group.png" class="card-img-top" alt="Gestionar usuarios"/>
                    <div class="card-body">
                        <h5 class="card-title">Gestionar usuarios</h5>
                        <a href="../vistausuarios/usuarios.php" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col">
                <div class="card">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/006/692/987/small_2x/download-pdf-icon-template-black-color-editable-download-pdf-icon-symbol-flat-sign-isolated-on-white-background-simple-logo-illustration-for-graphic-and-web-design-free-vector.jpg" class="card-img-top" alt="Reportes de entrada"/>
                    <div class="card-body">
                        <h5 class="card-title">Reportes de entrada</h5>
                        <a href="enlace_a_reportes_entrada.html" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/006/692/987/small_2x/download-pdf-icon-template-black-color-editable-download-pdf-icon-symbol-flat-sign-isolated-on-white-background-simple-logo-illustration-for-graphic-and-web-design-free-vector.jpg" class="card-img-top" alt="Reportes de salida"/>
                    <div class="card-body">
                        <h5 class="card-title">Reportes de salida</h5>
                        <a href="enlace_a_reportes_salida.html" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://w7.pngwing.com/pngs/288/840/png-transparent-computer-icons-user-crowd-social-group-others-miscellaneous-monochrome-social-group.png" class="card-img-top" alt="Cerrar sesión"/>
                    <div class="card-body text-center">
                        <h5 class="card-title-logout">Cerrar sesión</h5>
                        <button class="btn btn-danger" onclick="logout()">Cerrar sesión</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5">
        <p>&copy; 2024 Comisión del Agua del Estado de Veracruz || CAEV.</p>
    </footer>

    <script>
        function logout() {
            window.location.href = 'logout.php'; // Redirige a la página de cierre de sesión
        }
    </script>
</body>
</html>
