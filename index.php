<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestio de Stock</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Agrega aquí tus enlaces a hojas de estilo personalizadas si es necesario -->
</head>
<body>

    <header class="bg-primary text-white text-center py-5">
        <h1>Gestio de Stock</h1>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Mostrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Insertar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Editar</a>
                </li>
            </ul>
        </div>
        <div class="ml-auto">
            <button class="btn btn-light mr-2" data-toggle="modal" data-target="#login.php">Login</button>
            <button class="btn btn-light" data-toggle="modal" data-target="#registerModal">Registrar</button>
        </div>
    </nav>

    <section class="container mt-5">
        <h2>Contenido Principal</h2>
        <p>Este es un ejemplo de una página web con Bootstrap. Puedes utilizar las clases de Bootstrap para dar estilo a tus elementos y hacer que la página sea receptiva.</p>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; <?php echo date("Y"); ?> Mi Página con Bootstrap</p>
    </footer>

    <!-- Modales para Login y Registro -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <!-- Agrega aquí el contenido del modal de login -->
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <!-- Agrega aquí el contenido del modal de registro -->
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Agrega aquí tus scripts o enlaces a scripts personalizados si es necesario -->

</body>
</html
