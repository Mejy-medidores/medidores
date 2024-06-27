<?php
include '../Clases/conexion.php';

$coleccion = 'medidores'; 

$id = $_GET['id']; // ID del documento a eliminar

function eliminarDatos($coleccion, $id) {
    global $database;
    $collection = $database->$coleccion;

    $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];

    $resultado = $collection->deleteOne($filter);

    return $resultado->getDeletedCount();
}

$registrosEliminados = eliminarDatos($coleccion, $id);

if ($registrosEliminados) {
    header('Location: ../vistas/medidores.php');
    exit;
} else {
    echo "Error al eliminar el registro";
}
?>
