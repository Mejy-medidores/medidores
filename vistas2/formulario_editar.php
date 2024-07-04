<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Registro</title>
</head>
<body>
    <h1>Editar registro</h1>

    <?php
    // Verificar si se recibió el parámetro 'id'
    $id = $_GET['id'] ?? null;
    if (!$id) {
        echo "ID del documento no especificado.";
        exit; // Detener la ejecución si no se especifica el ID
    }
    
    // Convertir el ID a un objeto BSON para la consulta
    try {
        $objectId = new MongoDB\BSON\ObjectId($id);
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "ID del documento no válido.";
        exit; // Detener la ejecución si el ID no es válido
    }

    // Consultar el registro específico en MongoDB
    require '../Clases/conexion2.php'; // Ajusta la ruta según la ubicación de tu archivo

    $query = ['_id' => $objectId];
    $registro = $collection->findOne($query);

    // Verificar si se encontró el registro
    if (!$registro) {
        echo "No se encontró el registro con ID: " . $id;
        exit; // Detener la ejecución si no se encuentra el registro
    }
    ?>

    <form action="../funciones/procesar_editar2.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="<?php echo $registro->cantidad; ?>" required><br><br>
        
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo $registro->marca; ?>" required><br><br>
        
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo $registro->modelo; ?>" required><br><br>
        
        <label for="provedor">Proveedor:</label>
        <input type="text" id="provedor" name="provedor" value="<?php echo $registro->provedor; ?>" required><br><br>
        
        <label for="procesoad">Proceso de adquisición:</label>
        <input type="text" id="procesoad" name="procesoad" value="<?php echo $registro->procesoad; ?>" required><br><br>
        
        <label for="factura">Factura:</label>
        <input type="text" id="factura" name="factura" value="<?php echo $registro->factura; ?>" required><br><br>
        
        <label for="fechafactura">Fecha de Factura:</label>
        <input type="date" id="fechafactura" name="fechafactura" value="<?php echo $registro->fechafactura; ?>" required><br><br>
        
        <label for="fechaentrada">Fecha de Entrada:</label>
        <input type="date" id="fechaentrada" name="fechaentrada" value="<?php echo $registro->fechaentrada; ?>" required><br><br>
        
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
