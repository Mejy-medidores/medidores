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
            background-color: #b0e0e6;
            background: linear-gradient(to bottom, #b0e0e6, #3b6978);
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #0EA9AD;
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
    </style>


<script>
    function confirmarEliminar(id) {
        if (confirm("Seguro que quieres eliminar este registro?")) {
            window.location.href = "../funciones/procesar_eliminar.php?id=" + id;
        }else{
            return false;
    }
}
</script>

</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0EA9AD;">
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
                        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../vistas2/medidores_entrantes.php">Medidores de salida</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>



    <h1>Salida de: <?php echo $coleccion; ?></h1>
    <img src="../IMG/logo.png" alt="CAEV" width="500" height="160">
    <br>
    <a href="./formulario_crear.php"><button type="button" class="btn btn-primary">Agregar Nuevo Registro <i class="bi bi-plus-circle-fill"></i></button></a>
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
               <th scope="col">Editar</th>
               <th scope="col">Eliminar</th>
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
                    <td>
                        <a href="./formulario_editar.php?id=<?php echo $dato->_id; ?>"><button type="button" class="btn btn-warning">Editar <i class="bi bi-pen-fill"></i></button>
                    </td>
                    <td>
                         <button onclick="confirmarEliminar('<?php echo $dato->_id; ?>')"type="button" class="btn btn-danger">Eliminar <i class="bi bi-trash-fill"></i></button>
                    </td>
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
