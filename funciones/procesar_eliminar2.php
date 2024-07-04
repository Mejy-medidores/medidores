<?php
include '../Clases/conexion2.php';

$coleccion = 'medidores_entrada'; 

$id = $_GET['id']; 

function eliminarDatos($coleccion, $id) {
    global $database;
    $collection = $database->$coleccion;

    $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];

    $resultado = $collection->deleteOne($filter);

    return $resultado->getDeletedCount();
}

$registrosEliminados = eliminarDatos($coleccion, $id);

if ($registrosEliminados) {
    header('Location: ../vistas2/medidores_entrantes.php');
    exit;
} else {
    echo "Error al eliminar el registro";
}
?>
