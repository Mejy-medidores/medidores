<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Agregar nuevo registro</h1>
        <form action="../funciones/procesar_crear2.php" method="post" class="mt-4">
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>
            
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
            
            <div class="form-group">
                <label for="provedor">Proveedor:</label>
                <input type="text" class="form-control" id="provedor" name="provedor" required>
            </div>
            
            <div class="form-group">
                <label for="procesoad">Proceso de Adquisición:</label>
                <input type="text" class="form-control" id="procesoad" name="procesoad" required>
            </div>
            
            <div class="form-group">
                <label for="factura">Factura:</label>
                <input type="text" class="form-control" id="factura" name="factura" required>
            </div>
            
            <div class="form-group">
                <label for="fechafactura">Fecha de Factura:</label>
                <input type="date" class="form-control" id="fechafactura" name="fechafactura" required>
            </div>
            
            <div class="form-group">
                <label for="fechaentrada">Fecha de Entrada:</label>
                <input type="date" class="form-control" id="fechaentrada" name="fechaentrada" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
