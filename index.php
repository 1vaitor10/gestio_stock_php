<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Stock con Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Agrega aquí tus enlaces a hojas de estilo personalizadas si es necesario -->
</head>
<body>

    <header class="bg-primary text-white text-center py-5">
        <h1>Gestión de Stock</h1>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2>Inventario</h2>
                <!-- Aquí puedes agregar una tabla con la lista de productos en inventario -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Producto A</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Producto B</td>
                            <td>30</td>
                        </tr>
                        <!-- Agrega más filas según sea necesario -->
                    </tbody>
                </table>
            </div>

            <div class="col-md-8">
                <h2>Registrar Nuevo Producto</h2>
                <!-- Aquí puedes agregar un formulario para registrar nuevos productos -->
                <form>
                    <div class="form-group">
                        <label for="nombreProducto">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombreProducto" placeholder="Ingrese el nombre del producto">
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" placeholder="Ingrese la cantidad">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar Producto</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; <?php echo date("Y"); ?> Gestión de Stock con Bootstrap</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Agrega aquí tus scripts o enlaces a scripts personalizados si es necesario -->

</body>
</html>