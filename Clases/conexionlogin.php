<?php
require_once 'vendor/autoload.php'; // Asegúrate de que Composer haya generado el autoloader

use MongoDB\Client as MongoClient; // Usa el alias de MongoDB

$uri = "mongodb://localhost:27017"; // La URI de conexión a MongoDB
$client = new MongoClient($uri);

$database = $client->medidores;
$collection = $database->usuarios; // Cambia 'usuarios' por el nombre de tu colección de usuarios

function verificarUsuario($email, $password) {
    global $collection;

    // Buscar el usuario por email
    $usuario = $collection->findOne(['email' => $email]);

    if ($usuario) {
        if ($usuario && $usuario['password'] === $password) {
            return $usuario;
        }
        
    }

    return false;
}

?>
