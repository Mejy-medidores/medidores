<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <form action="../funciones/procesar_crear.php" method="post" class="mt-4">
                <div class="form-group">
                    <label for="num_medidor">Número de Medidor:</label>
                    <input type="text" class="form-control" id="num_medidor" name="num_medidor" required>
                </div>
                
                <div class="form-group">
                    <label for="cuentamedidor">Cuenta del Medidor:</label>
                    <input type="text" class="form-control" id="cuentamedidor" name="cuentamedidor" required>
                </div>
                
                <div class="form-group">
                    <label for="nombreusuario">Nombre de Usuario:</label>
                    <input type="text" class="form-control" id="nombreusuario" name="nombreusuario" required>
                </div>
                
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                
                <div class="form-group">
                    <label for="tipousuario">Tipo de Usuario:</label>
                    <input type="text" class="form-control" id="tipousuario" name="tipousuario" required>
                </div>
                
                <div class="form-group">
                    <label for="obra">Obra:</label>
                    <input type="text" class="form-control" id="obra" name="obra" required>
                </div>
                
                <div class="form-group">
                    <label for="cuadro">¿Lleva Cuadro?:</label>
                    <input type="text" class="form-control" id="cuadro" name="cuadro" required>
                </div>
                
                <div class="form-group">
                    <label for="fechainstalacion">Fecha de Instalación:</label>
                    <input type="date" class="form-control" id="fechainstalacion" name="fechainstalacion" required>
                </div>
                
                <div class="form-group">
                    <label for="fechasalida">Fecha de Salida:</label>
                    <input type="date" class="form-control" id="fechasalida" name="fechasalida">
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
