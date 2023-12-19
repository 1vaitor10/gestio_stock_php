<?php
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $contrasenya = $_POST['contrasenya'];
    $contrasenya2 = $_POST['contrasenya2'];
    
    if ($contrasenya == $contrasenya2) {
        $server = "localhost";
        $user = "root";
        $password = "";
        $dbname = "gestio_de_stock";

        // Conectar
        $db = new mysqli($server, $user, $password, $dbname);

        // Comprobar conexión
        if ($db->connect_error) {
            die("La conexión ha fallado, error número " . $db->connect_errno . ": " . $db->connect_error);
        } else {
            $contrasenya = password_hash($contrasenya, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO `usuari` (`username`, `Contrasenya`) VALUES (?, ?)");
            $stmt->bind_param('ss', $nom, $contrasenya);
            $stmt->execute();
            $stmt->close();
            $db->close();

            header("Location:login.php"); // Redirigir con PHP
            exit(); // Asegura que no se envíe nada más después de la redirección
        }
    } else {
        echo "Registro fallido: Las contraseñas no coinciden";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Enlaces CDN de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <form action="register.php" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required placeholder="Introdueix el teu nom">
            </div>
            <div class="mb-3">
                <label for="contrasenya" class="form-label">Contrasenya</label>
                <input type="password" name="contrasenya" class="form-control" required placeholder="Introdueix la teva contrasenya">
            </div>
            <div class="mb-3">
                <label for="contrasenya2" class="form-label">Torna a introduir la contrasenya</label>
                <input type="password" name="contrasenya2" class="form-control" required placeholder="Repeteix la teva contrasenya">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Registrarse</button>
        </form>

        <a href="login.php" class="mt-3 btn btn-secondary">Ya tengo cuenta</a>
    </div>

    <!-- Enlaces CDN de Bootstrap JS y Popper.js (requerido para ciertos componentes de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>