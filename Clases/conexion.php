<?php
require '../vendor/autoload.php'; // Asegúrate de que Composer haya generado el autoloader

$uri = "mongodb://localhost:27017"; // La URI de conexión a MongoDB
$client = new MongoDB\Client($uri);

$database = $client->medidores; 
$collection = $database->medidores; 

function leerDatos($coleccion) {
    global $database;
    $collection = $database->medidores; 
    $resultados = $collection->find()->toArray();
    return $resultados;
}

echo "Conexión exitosa a MongoDB";
?>
