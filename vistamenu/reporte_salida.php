<?php
include '../Clases/conexion.php';

$coleccion = 'medidores'; // Reemplaza con el nombre de tu colección
$datos = leerDatos($coleccion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Medidores</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
       body {
        position: relative; /* Asegura que los elementos se posicionen correctamente en relación al body */
        background-image: url('../IMG/fondo.jpg'); /* Ruta a tu imagen de fondo */
        background-size: cover; /* Asegura que la imagen cubra todo el fondo */
        background-position: center; /* Centra la imagen en el fondo */
        background-repeat: no-repeat; /* Evita que la imagen se repita */
        height: 100vh;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        font-size: 16px; /* Tamaño de fuente inicial */
        color: #fff; /* Color del texto para asegurar visibilidad sobre el fondo */
    }

        .navbar {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente para el navbar */
            border-bottom: 2px solid #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand img {
            border-radius: 10%;
            margin-right: 10px;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
            margin-right: 15px;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }
        .navbar-nav .nav-link:hover {
            color: #e0f7fa !important;
        }
        .navbar-toggler {
            border: 1px solid #fff;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.7%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        th {
        background-color: #343a40;
        color: white;
    }
    td {
        background-color: #ffffff; /* Fondo blanco para las celdas de la tabla */
    }
    </style>

</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light" >
    <a class="navbar-brand" href="#">
                <img src="../IMG/logo2.png" alt="Logo" width="90" height="80" class="d-inline-block align-top">
                MEJY || 2°do Modulo
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./menu.php">Regresar al menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./medidores_entrantes.php">Reporte de los medidores entrantes</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>



    <h1>Salida de: <?php echo $coleccion; ?></h1>
    <img src="../IMG/logo.png" alt="CAEV" width="500" height="160">
    <br>
    <table class="table" border="1">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">numero</th>
                <th scope="col">cuenta</th>
                <th scope="col">usuario</th>
                <th scope="col">direccion</th>
                <th scope="col">tipo de usuario</th>
                <th scope="col">obra</th>
                <th scope="col">lleva cuadro</th>
                <th scope="col">fecha instalación</th>
                <th scope="col">salida</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dato): ?>
                <tr>
                    <td><?php echo $dato->_id; ?></td>
                    <td><?php echo $dato->num_medidor; ?></td>
                    <td><?php echo $dato->cuentamedidor; ?></td>
                    <td><?php echo $dato->nombreusuario; ?></td>
                    <td><?php echo $dato->direccion; ?></td>
                    <td><?php echo $dato->tipousuario; ?></td>
                    <td><?php echo $dato->obra; ?></td>
                    <td><?php echo $dato->cuadro; ?></td>
                    <td><?php echo $dato->fechainstalacion; ?></td>
                    <td><?php echo $dato->fechasalida; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
       
</body>
<!-- Incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Incluir Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<!-- Incluir Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

</html>
