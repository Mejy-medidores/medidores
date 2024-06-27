<?php
include '../Clases/conexion.php';

$coleccion = 'medidores'; 
$datos = [
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

function crearDatos($coleccion, $datos) {
    global $database;
    $collection = $database->$coleccion;
    $resultado = $collection->insertOne($datos);
    return $resultado->getInsertedId();
}

$idInsertado = crearDatos($coleccion, $datos);

if ($idInsertado) {
    header('Location: ../vistas/medidores.php');
    exit;
} else {
    echo "Error al crear el documento";
}
?>
