<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Registro</title>
</head>
<body>
    <h1>Agregar nuevo registro</h1>
    <form action="../funciones/procesar_crear.php" method="post">
        <label for="num_medidor">Número de Medidor:</label>
        <input type="text" id="num_medidor" name="num_medidor" required><br><br>
        
        <label for="cuentamedidor">Cuenta del Medidor:</label>
        <input type="text" id="cuentamedidor" name="cuentamedidor" required><br><br>
        
        <label for="nombreusuario">Nombre de Usuario:</label>
        <input type="text" id="nombreusuario" name="nombreusuario" required><br><br>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>
        
        <label for="tipousuario">Tipo de Usuario:</label>
        <input type="text" id="tipousuario" name="tipousuario" required><br><br>
        
        <label for="obra">Obra:</label>
        <input type="text" id="obra" name="obra" required><br><br>
        
        <label for="cuadro">¿Lleva Cuadro?:</label>
        <input type="text" id="cuadro" name="cuadro" required><br><br>
        
        <label for="fechainstalacion">Fecha de Instalación:</label>
        <input type="date" id="fechainstalacion" name="fechainstalacion" required><br><br>
        
        <label for="fechasalida">Fecha de Salida:</label>
        <input type="date" id="fechasalida" name="fechasalida"><br><br>
        
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
