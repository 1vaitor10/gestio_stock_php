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
               
                <a class="nav-link active" aria-current="page" href="index.php?Controller=producte&action=mostrartot">productes</a>
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
    <form class="form-inline" id="registerForm" action="registre.php" method="post" enctype="multipart/form-data">
        <a class="btn btn-light mr-2" href="login.php">Login</a>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
            
        </div>
    </nav>

    <section class="container mt-5">
        <h2>Contenido Principal</h2>
        <p>Este es un ejemplo de una página web con Bootstrap. Puedes utilizar las clases de Bootstrap para dar estilo a tus elementos y hacer que la página sea receptiva.</p>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; <?php echo date("Y"); ?> Mi Página con Bootstrap</p>
    </footer>

    <!-- Modal de Registro -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario de Registro -->
                    <form id="registerForm" action="register.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="newUsername">Nuevo Nombre de usuario</label>
                            <input type="text" class="form-control" id="newUsername" name="newUsername" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>
                        <div class="form-group">
                            <label>Selecciona una opción:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="photoOption" id="selectFile" value="selectFile" checked>
                                <label class="form-check-label" for="selectFile">Seleccionar Archivo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="photoOption" id="activateCamera" value="activateCamera">
                                <label class="form-check-label" for="activateCamera">Activar Cámara</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="userPhoto">Foto (opcional)</label>
                            <input type="file" class="form-control-file" id="userPhoto" name="userPhoto">
                        </div>
                        <button type="button" id="captureButton" class="btn btn-primary">Capturar Foto</button>
                        <canvas id="photoCanvas" style="display: none;"></canvas>
                        <img id="capturedImage" style="display: none;" class="img-fluid" alt="Captured Image">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>