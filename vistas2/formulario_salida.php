<?php
// Verificar si se recibió el parámetro 'id'
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID del documento no especificado.";
    exit;
}

// Convertir el ID a un objeto BSON para la consulta
try {
    $objectId = new MongoDB\BSON\ObjectId($id);
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "ID del documento no válido.";
    exit;
}

// Consultar el registro específico en MongoDB
require '../Clases/conexion2.php'; // Ajusta la ruta según la ubicación de tu archivo

$query = ['_id' => $objectId];
$registro = $collection->findOne($query);

// Verificar si se encontró el registro
if (!$registro) {
    echo "No se encontró el registro con ID: " . $id;
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dar Salida</title>
</head>
<body>
    <h1>Dar Salida</h1>
    <form action="../funciones/procesar_salida.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="num_medidor">Número de Medidor:</label>
        <input type="text" id="num_medidor" name="num_medidor" value="<?php echo $registro->cantidad; ?>" required><br><br>
        
        <label for="cuentamedidor">Cuenta del Medidor:</label>
        <input type="text" id="cuentamedidor" name="cuentamedidor" required><br><br>
        
        <label for="nombreusuario">Nombre de Usuario:</label>
        <input type="text" id="nombreusuario" name="nombreusuario" required><br><br>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>
        
        <label for="tipousuario">Tipo de Usuario:</label>
        <input type="text" id="tipousuario" name="tipousuario" required><br><br>
        
        <label for="obra">Obra:</label>
        <input type="text" id="obra" name="obra" required><br><br>
        
        <label for="cuadro">¿Lleva Cuadro?:</label>
        <input type="text" id="cuadro" name="cuadro" required><br><br>
        
        <label for="fechainstalacion">Fecha de Instalación:</label>
        <input type="date" id="fechainstalacion" name="fechainstalacion" required><br><br>
        
        <label for="fechasalida">Fecha de Salida:</label>
        <input type="date" id="fechasalida" name="fechasalida" required><br><br>
        
        <input type="submit" value="Guardar y Dar Salida">
    </form>
</body>
</html>