<?php
require '../vendor/autoload.php'; 

$uri = "mongodb://localhost:27017"; 
$client = new MongoDB\Client($uri);

$database = $client->medidores; 
$collection = $database->medidores_entrada; 

function leerDatos($coleccion) {
    global $database;
    $collection = $database->medidores_entrada; 
    $resultados = $collection->find()->toArray();
    return $resultados;
}

echo "Conexión exitosa";
?>
