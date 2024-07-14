<?php
session_start();
session_unset();
session_destroy();
header('Location: ../index.php'); // Cambia esto a la ruta de tu archivo de login
exit();
?>
