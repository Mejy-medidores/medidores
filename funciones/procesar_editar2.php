<?php
include '../Clases/conexion2.php';

$coleccion = 'medidores_entrada'; 

$id = $_POST['id']; 

$datosActualizados = [
    'cantidad' => $_POST['cantidad'],
    'marca' => $_POST['marca'],
    'modelo' => $_POST['modelo'],
    'provedor' => $_POST['provedor'],
    'procesoad' => $_POST['procesoad'],
    'factura' => $_POST['factura'],
    'fechafactura' => $_POST['fechafactura'],
    'fechaentrada' => $_POST['fechaentrada'],
];

function actualizarDatos($coleccion, $id, $datos) {
    global $database;
    $collection = $database->$coleccion;

    $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
    $update = ['$set' => $datos];

    $resultado = $collection->updateOne($filter, $update);

    return $resultado->getModifiedCount();
}

$registrosActualizados = actualizarDatos($coleccion, $id, $datosActualizados);

if ($registrosActualizados) {
  
    header('Location: ../vistas2/medidores_entrantes.php');
    exit;
} else {
    echo "Error al actualizar el registro";
}
?>
