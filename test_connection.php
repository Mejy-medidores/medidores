<?php
// Incluye el autoload generado por Composer
require_once 'C:/xampp/htdocs/Modulo2/vendor/autoload.php';

use MongoDB\Client as MongoClient;

// Define la URI de conexión a MongoDB
$uri = "mongodb://localhost:27017";
$client = new MongoClient($uri);

// Selecciona la base de datos y la colección
$database = $client->medidores; // Cambia 'medidores' por el nombre de tu base de datos
$collection = $database->usuarios; // Cambia 'usuarios' por el nombre de tu colección

// Realiza una consulta simple para verificar la conexión
$result = $collection->find()->toArray();

// Muestra el resultado de la consulta
echo '<pre>';
var_dump($result);
echo '</pre>';
?>
