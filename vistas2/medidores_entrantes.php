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
            window.location.href = "../funciones/procesar_eliminar2.php?id=" + id;
        }else{
            return false;
    }
}
</script>

</head>

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
                    <a class="nav-link" href="../vistas/medidores.php">Medidores que salieron</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<body>
    <h1>Salida de: <?php echo $coleccion; ?></h1>
    <img src="../IMG/logo.png" alt="CAEV" width="500" height="160">
    <br>
    <a href="./formulario_crear2.php"><button type="button" class="btn btn-primary">Agregar Nuevo Registro <i class="bi bi-plus-circle-fill"></i></button></a>
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
                    <td><?php echo $dato->_id; ?></td>
                    <td><?php echo $dato->cantidad; ?></td>
                    <td><?php echo $dato->marca; ?></td>
                    <td><?php echo $dato->modelo; ?></td>
                    <td><?php echo $dato->provedor; ?></td>
                    <td><?php echo $dato->procesoad; ?></td>
                    <td><?php echo $dato->factura; ?></td>
                    <td><?php echo $dato->fechafactura; ?></td>
                    <td><?php echo $dato->fechaentrada; ?></td>
                    <td>
                        <a href="./formulario_salida.php?id=<?php echo $dato->_id; ?>"><button type="button" class="btn btn-success">Salida <i class="bi bi-send-arrow-down-fill"></i></button>
                    </td>
                    <td>
                        <a href="./formulario_editar.php?id=<?php echo $dato->_id; ?>"><button type="button" class="btn btn-warning">Editar <i class="bi bi-pen-fill"></i></button>
                    </td>
                    <td>
                         <button onclick="confirmarEliminar('<?php echo $dato->_id; ?>')" type="button" class="btn btn-danger">Eliminar <i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
       
</body>
</html>
