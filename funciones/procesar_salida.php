<?php
require '../Clases/conexion2.php'; // Ajusta la ruta según la ubicación de tu archivo

$id = $_POST['id'] ?? null;
$num_medidor = $_POST['num_medidor'] ?? null;
$cuentamedidor = $_POST['cuentamedidor'] ?? null;
$nombreusuario = $_POST['nombreusuario'] ?? null;
$direccion = $_POST['direccion'] ?? null;
$tipousuario = $_POST['tipousuario'] ?? null;
$obra = $_POST['obra'] ?? null;
$cuadro = $_POST['cuadro'] ?? null;
$fechainstalacion = $_POST['fechainstalacion'] ?? null;
$fechasalida = $_POST['fechasalida'] ?? null;

if (!$id || !$num_medidor || !$cuentamedidor || !$nombreusuario || !$direccion || !$tipousuario || !$obra || !$cuadro || !$fechainstalacion || !$fechasalida) {
    echo "Todos los campos son obligatorios.";
    exit;
}

try {
    $objectId = new MongoDB\BSON\ObjectId($id);
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "ID del documento no válido.";
    exit;
}

// Consultar el registro específico en MongoDB
$query = ['_id' => $objectId];
$registro = $collection->findOne($query);

if (!$registro) {
    echo "No se encontró el registro con ID: " . $id;
    exit;
}

// Crear el nuevo registro con los datos proporcionados
$nuevoRegistro = [
    'num_medidor' => $num_medidor,
    'cuentamedidor' => $cuentamedidor,
    'nombreusuario' => $nombreusuario,
    'direccion' => $direccion,
    'tipousuario' => $tipousuario,
    'obra' => $obra,
    'cuadro' => $cuadro,
    'fechainstalacion' => $fechainstalacion,
    'fechasalida' => $fechasalida,
];

// Insertar el nuevo registro en la colección de medidores
$coleccionSalida = 'medidores';
$collectionSalida = $client->selectCollection('medidores', $coleccionSalida);
$resultadoInsertar = $collectionSalida->insertOne($nuevoRegistro);

// Verificar si la inserción fue exitosa
if ($resultadoInsertar->getInsertedCount() === 1) {
    // Eliminar el registro original de la colección de medidores de entrada
    $resultadoEliminar = $collection->deleteOne($query);
    
    if ($resultadoEliminar->getDeletedCount() === 1) {
        echo "El registro ha sido transferido correctamente.";
    } else {
        echo "Error al eliminar el registro de la colección original.";
    }
} else {
    echo "Error al insertar el registro en la colección de medidores.";
}

header('Location: ../vistas2/medidores_entrantes.php');
exit;
?>
