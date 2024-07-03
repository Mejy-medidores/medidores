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
            window.location.href = "../funciones/procesar_eliminar.php?id=" + id;
        }else{
            return false;
    }
}
</script>

</head>
<button><a href="../vistas2/medidores_entrantes.php" class="button">Ir a los medidores de entrada</a></button>
<body>
    <h1>Salida de: <?php echo $coleccion; ?></h1>
    <img src="../IMG/logo.png" alt="CAEV" width="500" height="160">
    <br>
    <a href="./formulario_crear.php">Agregar Nuevo Registro</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>numero</th>
                <th>cuenta</th>
                <th>usuario</th>
                <th>direccion</th>
                <th>tipo de usuario</th>
                <th>obra</th>
                <th>lleva cuadro</th>
                <th>fecha instalación</th>
                <th>salida</th>
               <th>Editar</th>
               <th>Eliminar</th>
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
