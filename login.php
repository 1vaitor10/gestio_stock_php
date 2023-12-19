<?php
session_start();

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $contrasenya = $_POST['contrasenya'];
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "gestio_de_stock";

    // Conectar de forma segura
    $db = new mysqli($server, $user, $password, $dbname);

    // Comprobar conexión
    if ($db->connect_error) {
        die("La conexión ha fallado, error número " . $db->connect_errno . ": " . $db->connect_error);
    }

    // Utilizar consultas preparadas para evitar inyecciones SQL
    $stmt = $db->prepare("SELECT `contraseña`, `nombre_usuario` FROM `usuarios` WHERE `nombre_usuario`=? ");
    $stmt->bind_param('s', $nom);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    $db->close();

    if ($row && password_verify($contrasenya, $row['contraseña'])) {
        $_SESSION['nom'] = $nom;
        header("Location: mostrar.php");
        exit(); // Asegura que no se envíe nada más después de la redirección
    } else {
        // Evitar dar demasiada información sobre el fallo
        echo "Les credencials son incorrectes";
    }
}

if (isset($_GET["logout"]) && $_GET["logout"] == 1) {
    session_destroy();
    header("Location: login.php");
    exit(); // Asegura que no se envíe nada más después de la redirección
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Enlaces CDN de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required placeholder="Introdueix el teu nom">
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contrasenya</label>
                <input type="password" name="contraseña" class="form-control" required placeholder="Introdueix la teva contrasenya">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Entrar</button>
        </form>

        <a href="register.php" class="mt-3 btn btn-secondary">Registrat</a>
    </div>

    <!-- Enlaces CDN de Bootstrap JS y Popper.js (requerido para ciertos componentes de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>