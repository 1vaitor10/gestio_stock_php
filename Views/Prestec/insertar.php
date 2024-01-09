<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Cámara</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5iq6U2z7U3e9aRS3nTmI9gAOp6usjov3V+NMlZA9b6EGGoI1Wwr5QkdA1d1X" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <form class="form-control" action="index.php?controller=prestec&action=crear" method="post">

        <label for="id">id</label>
        <input class="form-control" type="text" name="id" id="id" required>

        <label for="id_producto">Id_producto</label>
        <input class="form-control" type="text" name="id_producto" id="id_producto" required>

        <label for="Id_usuario">Id_usuario</label>
        <input class="form-control" type="text" name="id_usuario" id="id_usuario" required>

        <label for="nombre_usuario">nombre_usuario</label>
        <input class="form-control" type="text" name="nombre_usuario" id="nombre_usuario" required>

        <label for="cantidad_productos">cantidad_productos</label>
        <input class="form-control" type="text" name="cantidad_productos" id="cantidad_productos" required>

        <label for="data">data</label>
        <input class="form-control" type="date" name="data" id="data" required>

        <input class="form-control" type="submit" value="Insertar">
    </form>
</div>

</body>
</html>
