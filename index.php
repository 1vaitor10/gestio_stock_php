<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestio de Stock</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

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
                    <a class="nav-link active" aria-current="page" href="index.php?controller=arxivar&action=mostrarse">Arxivar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?controller=prestec&action=mostrarse">Prestec</a>
                </li>
            </ul>
        </div>
        <div class="ml-auto">
            <form class="form-inline" id="registerForm" action="index.php" method="post" enctype="multipart/form-data">
                <a class="btn btn-light mr-2" href="login.php">Login</a>
             
            </form>
        </div>
    </nav>

    <?php
    require_once "autoload.php";

    

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

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
