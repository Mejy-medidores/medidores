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
    <a href="./formulario_crear2.php"><button type="button" class="btn btn-primary">Agregar Nuevo Registro  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
  <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
  <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
</svg><i class="bi bi-folder-plus"></i></button></a>
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
