<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../IMG/fondo.jpg'); /* Cambia esta ruta */
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(5px);
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            border: 2px solid #007bff; /* Borde de color */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            padding: 30px;
            margin-top: 50px;
        }
        h1 {
            color: #007bff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-control {
            border-radius: 5px;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="form-container col-md-6">
            <h1 class="text-center">Agregar nuevo registro</h1>
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
                
                <button type="submit" class="btn btn-primary btn-block">Agregar</button>
            </form>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
