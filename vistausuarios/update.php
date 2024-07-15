<?php
include '../Clases/conexionusuarios.php';
$id = new MongoDB\BSON\ObjectId($_GET['id']);
$usuario = $collection->findOne(['_id' => $id]);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $collection->updateOne(
        ['_id' => $id],
        ['$set' => ['email' => $email, 'password' => $password, 'rol' => $rol]]
    );

    header("Location: usuarios.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="my-4">Editar Usuario</h1>
    <form method="POST" action="update.php?id=<?php echo $usuario['_id']; ?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $usuario['password']; ?>" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" class="form-control" required>
                <option value="admin" <?php echo $usuario['rol'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="user" <?php echo $usuario['rol'] == 'user' ? 'selected' : ''; ?>>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="usuarios.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
