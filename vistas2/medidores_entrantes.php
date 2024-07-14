<?php
include '../Clases/conexion2.php';

$coleccion = 'medidores_entrada'; 
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

    /* Aplica el filtro de difuminado y el degradado sobre la imagen de fondo */
    body::before {
        content: ""; /* Crea un elemento pseudo que será el fondo difuminado */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0, 0, 128, 0.5), rgba(128, 0, 128, 0.5)); /* Degradado de azul a morado con opacidad */
        filter: blur(10px); /* Aplica el difuminado */
        z-index: -1; /* Asegura que el pseudo-elemento esté detrás del contenido */
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
        color: #000 !important; /* Cambia el color del texto en el navbar para mejor contraste */
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
    .font-size-controls {
        display: flex;
        align-items: center;
        margin-left: auto;
    }
    .font-size-controls button {
        margin-left: 10px;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
    }
    .font-size-controls button:hover {
        background-color: #e0f7fa;
    }
    .container {
        max-width: 100%; /* Asegura que el contenedor use todo el ancho disponible */
        padding-left: 15px;
        padding-right: 15px;
    }
    .table-container {
        margin: 0 auto; /* Centra el contenedor de la tabla */
        overflow-x: auto; /* Permite el desplazamiento horizontal si es necesario */
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 12px;
        text-align: center;
    }
    th {
        background-color: #343a40;
        color: white;
    }
    td {
        background-color: #ffffff; /* Fondo blanco para las celdas de la tabla */
    }
    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>


</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
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
                        <a class="nav-link" href="../vistamenu/menu.php">Regresar al menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../vistas/medidores.php">Medidores que salieron</a>
                    </li>
                    <li class="nav-item font-size-controls">
                        <button onclick="cambiarTamanoFuente(-2)">A -</button>
                        <button onclick="cambiarTamanoFuente(2)">A +</button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <h1>Salida de: <?php echo htmlspecialchars($coleccion); ?></h1>
        <img src="../IMG/logo.png" alt="CAEV" width="500" height="160">
        <br>
        <a href="./formulario_crear2.php"><button type="button" class="btn btn-primary">Agregar Nuevo Registro <i class="bi bi-plus-circle-fill"></i></button></a>
        <div class="table-container">
            <table class="table" border="1">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Numero</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Provedor</th>
                        <th>Proceso de adquisición</th>
                        <th>Factura</th>
                        <th>Fecha de facturación</th>
                        <th>fecha de entrada</th>
                        <th>salida</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $dato): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($dato->_id); ?></td>
                            <td><?php echo htmlspecialchars($dato->cantidad); ?></td>
                            <td><?php echo htmlspecialchars($dato->marca); ?></td>
                            <td><?php echo htmlspecialchars($dato->modelo); ?></td>
                            <td><?php echo htmlspecialchars($dato->provedor); ?></td>
                            <td><?php echo htmlspecialchars($dato->procesoad); ?></td>
                            <td><?php echo htmlspecialchars($dato->factura); ?></td>
                            <td><?php echo htmlspecialchars($dato->fechafactura); ?></td>
                            <td><?php echo htmlspecialchars($dato->fechaentrada); ?></td>
                            <td>
                                <a href="./formulario_salida.php?id=<?php echo urlencode($dato->_id); ?>"><button type="button" class="btn btn-success">Salida <i class="bi bi-send-arrow-down-fill"></i></button></a>
                            </td>
                            <td>
                                <a href="./formulario_editar.php?id=<?php echo urlencode($dato->_id); ?>"><button type="button" class="btn btn-warning">Editar <i class="bi bi-pen-fill"></i></button></a>
                            </td>
                            <td>
                                <button onclick="confirmarEliminar('<?php echo urlencode($dato->_id); ?>')" type="button" class="btn btn-danger">Eliminar <i class="bi bi-trash-fill"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        let tamanoFuente = 16; // Tamaño de fuente inicial

        function cambiarTamanoFuente(cambio) {
            tamanoFuente += cambio;
            if (tamanoFuente < 10) tamanoFuente = 10; // Tamaño mínimo de fuente
            if (tamanoFuente > 30) tamanoFuente = 30; // Tamaño máximo de fuente
            document.body.style.fontSize = tamanoFuente + 'px';
            document.querySelectorAll('table').forEach(table => {
                table.style.fontSize = tamanoFuente + 'px';
            });
        }

        function confirmarEliminar(id) {
            if (confirm("Seguro que quieres eliminar este registro?")) {
                window.location.href = "../funciones/procesar_eliminar2.php?id=" + id;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>
