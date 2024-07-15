<?php
include '../Clases/conexionusuarios.php';
$usuarios = $collection->find();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este usuario?, no se puede revertir la acción.")) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <h1 class="my-4">Lista de Usuarios</h1>
    <div class="mb-4">
        <a href="create.php" class="btn btn-primary">Agregar Usuario</a>
        <a href="../vistamenu/menu.php" class="btn btn-secondary">Regresar al menú</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Email</th>
            <th>Password</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['password']; ?></td>
                <td><?php echo $usuario['rol']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $usuario['_id']; ?>" class="btn btn-warning">Editar</a>
                    <button class="btn btn-danger" onclick="confirmarEliminacion('<?php echo $usuario['_id']; ?>')">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
