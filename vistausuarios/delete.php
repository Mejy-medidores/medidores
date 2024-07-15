<?php
include '../Clases/conexionusuarios.php';

$id = new MongoDB\BSON\ObjectId($_GET['id']);
$collection->deleteOne(['_id' => $id]);

header("Location: usuarios.php");
exit;
?>
