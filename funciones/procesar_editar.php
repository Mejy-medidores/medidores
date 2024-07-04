<?php
include '../Clases/conexion.php';

$coleccion = 'medidores'; 

$id = $_POST['id']; // ID del documento a actualizar

$datosActualizados = [
    'num_medidor' => $_POST['num_medidor'],
    'cuentamedidor' => $_POST['cuentamedidor'],
    'nombreusuario' => $_POST['nombreusuario'],
    'direccion' => $_POST['direccion'],
    'tipousuario' => $_POST['tipousuario'],
    'obra' => $_POST['obra'],
    'cuadro' => $_POST['cuadro'],
    'fechainstalacion' => $_POST['fechainstalacion'],
    'fechasalida' => $_POST['fechasalida'],
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
  
    header('Location: ../vistas/medidores.php');
    exit;
} else {
    echo "Error al actualizar el registro";
}
?>
