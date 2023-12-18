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
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?controller=producte&action=mostrartot">Producte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?controller=nota&action=llistar">Notes</a>
                </li>
            </ul>
        </div>
        <div class="ml-auto">
            <form class="form-inline" id="registerForm" action="index.php" method="post" enctype="multipart/form-data">
                <a class="btn btn-light mr-2" href="login.php">Login</a>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </nav>

    <?php
    require_once "autoload.php";

    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar si se ha enviado una imagen
        if (!empty($_POST['foto'])) {
            // Obtener los datos del formulario
            $categoria = $_POST['categoria'];
            $nombre = $_POST['nombre'];
            $fecha = $_POST['fecha'];
            $estanteria = $_POST['estanteria'];
            $imagen = $_POST['imagen'];

            // Obtener la foto en formato base64
            $fotoBase64 = $_POST['foto'];

            // Decodificar la imagen base64
            $fotoBinaria = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $fotoBase64));

            // Nombre del archivo para la imagen
            $nombreArchivo = 'IMG/' . uniqid('imagen_') . '.png';

            // Ruta completa del archivo
            $rutaArchivo = __DIR__ . '/' . $nombreArchivo;

            // Guardar la imagen en la carpeta "IMG"
            file_put_contents($rutaArchivo, $fotoBinaria);

            // Conexión a la base de datos (ajusta las credenciales según tu configuración)
            $servername = "localhost"; // Cambia esto si es diferente en tu configuración
            $username = "root";          // Cambia esto si es diferente en tu configuración
            $password = "";              // Cambia esto si es diferente en tu configuración
            $dbname = "gestio_de_stock"; // Cambia esto con el nombre de tu base de datos

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Preparar la sentencia SQL
            $sql = "INSERT INTO productos (categoria, nombre, fecha, estanteria, imagen) VALUES ('$categoria', '$nombre', '$fecha', '$estanteria', '$nombreArchivo')";

            // Ejecutar la sentencia SQL
            if ($conn->query($sql) === TRUE) {
                echo "Registro insertado correctamente en la base de datos.";
            } else {
                echo "Error al insertar el registro: " . $conn->error;
            }

            // Cerrar la conexión a la base de datos
            $conn->close();

            // Resto del procesamiento del formulario
            // ...
        } else {
            echo "Error: Debes seleccionar una imagen.";
        }
    }

    if (isset($_GET["controller"]) && class_exists($_GET["controller"])) {
        $nomcontroller = $_GET["controller"] . "controller";
        $controller = new $nomcontroller();

        if (isset($_GET["action"]) && method_exists($controller, $_GET["action"])) {
            $action = $_GET["action"];
            $controller->$action();
        } else {
            echo $_GET["action"] . " no existe este método";
        }
    } else {
        echo $_GET["controller"] . " no existe este controlador";
    }
    ?>

    <!-- Modal de Registro -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <!-- ... (Resto de tu HTML modal) ... -->
    </div>

    <!--content end-->
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
