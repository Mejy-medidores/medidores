<?php
require_once 'C:/xampp/htdocs/Modulo2/vendor/autoload.php';
// Asegúrate de que Composer haya generado el autoloader

$uri = "mongodb://localhost:27017"; // La URI de conexión a MongoDB
$client = new MongoDB\Client($uri);

$database = $client->medidores;
$collection = $database->usuarios; // Cambia 'usuarios' por el nombre de tu colección de usuarios

function verificarUsuario($email, $password) {
    global $collection;
    $usuario = $collection->findOne(['email' => $email, 'password' => $password]);
    return $usuario;
}
echo realpath('../vendor/autoload.php');

?>
