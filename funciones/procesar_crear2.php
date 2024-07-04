<?php
include '../Clases/conexion2.php';

$coleccion = 'medidores_entrada'; 
$datos = [
    'cantidad' => $_POST['cantidad'],
    'marca' => $_POST['marca'],
    'modelo' => $_POST['modelo'],
    'provedor' => $_POST['provedor'],
    'procesoad' => $_POST['procesoad'],
    'factura' => $_POST['factura'],
    'fechafactura' => $_POST['fechafactura'],
    'fechaentrada' => $_POST['fechaentrada'],
];

function crearDatos($coleccion, $datos) {
    global $database;
    $collection = $database->$coleccion;
    $resultado = $collection->insertOne($datos);
    return $resultado->getInsertedId();
}

$idInsertado = crearDatos($coleccion, $datos);

if ($idInsertado) {
    header('Location: ../vistas2/medidores_entrantes.php');
    exit;
} else {
    echo "Error al crear el documento";
}
?>
