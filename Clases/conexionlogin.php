<?php
require '../vendor/autoload.php'; // Asegúrate de que Composer haya generado el autoloader

$uri = "mongodb://localhost:27017"; // La URI de conexión a MongoDB
$client = new MongoDB\Client($uri);

$database = $client->medidores;
$collection = $database->usuarios;

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Buscar el usuario en la base de datos
    $user = $collection->findOne(['email' => $email, 'password' => $password]);

    if ($user) {
        // Autenticación exitosa
        $_SESSION['user'] = $email; // Guardar el usuario en la sesión
        header('Location: ../vistamenu/menu.html');
        exit();
    } else {
        // Autenticación fallida
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
