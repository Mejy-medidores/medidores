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

    <style>
        body {
            background-color: #b0e0e6;
            background: linear-gradient(to bottom, #b0e0e6, #3b6978);
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../IMG/logo2.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-top">
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
    <a href="./formulario_crear2.php">Agregar Nuevo Registro</a>
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
                        <a href="./formulario_salida.php?id=<?php echo $dato->_id; ?>">Dar Salida</a>
                    </td>
                    <td>
                        <a href="./formulario_editar.php?id=<?php echo $dato->_id; ?>">Editar</a>
                    </td>
                    <td>
                         <button onclick="confirmarEliminar('<?php echo $dato->_id; ?>')">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
       
</body>
</html>
