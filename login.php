<?php
session_start();

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $contrasenya = $_POST['contraseña'];
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "gestio_de_stock";

    
    $db = new mysqli($server, $user, $password, $dbname);

    if ($db->connect_error) {
        die("La conexión ha fallado, error número " . $db->connect_errno . ": " . $db->connect_error);
    }
   
    
    $stmt = $db->prepare("SELECT `contraseña`, `nombre_usuario` FROM `usuarios` WHERE `nombre_usuario`=? ");
    $stmt->bind_param('s', $nom);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    echo  $row['contraseña'];
    if ($row && password_verify($contrasenya, $row['contraseña'])) {
        $_SESSION['nom'] = $nom;
        header("Location: index.php?controller=producte&action=mostrartot");
        exit(); 
    } else {
              echo "Les credencials son incorrectes";
    }
    $stmt->close();
    $db->close();
}

if (isset($_GET["logout"]) && $_GET["logout"] == 1) {
    session_destroy();
    header("Location: login.php");
    exit(); 
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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>