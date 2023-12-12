<?php
    session_start();
    if (isset($_POST['submit'])) {
        $nom = $_POST['nom'];
        $contrasenya = $_POST['contrasenya'];
        $server = "localhost";
        $user = "root";
        $password = "";
        $dbname = "gestio_de_stock";

        // Conectar
        $db = new mysqli($server, $user, $password, $dbname);
        // Comprobar conexión
        if ($db->connect_error) {
            die("La conexión ha fallado, error número " . $db->connect_errno . ": " . $db->connect_error);
        }

        $stmt = $db->prepare("SELECT `contraseña`,`nombre_usuario` FROM `usuarios` WHERE `nombre_usuario`=? ");
        $stmt->bind_param('s', $nom);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $db->close();

        if (password_verify($contrasenya, $row['contraseña'])) {
            $_SESSION['nom'] = $nom;
            header("Location: mostrar.php");
            exit(); // Asegura que no se envíe nada más después de la redirección
        } else {
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
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="nom">Nom</label><br>
        <input type="text" name="nom" id="" required placeholder="Introdueix el teu nom">
        <br>
        <label for="Contrasenya">Contrasenya</label><br>
        <input type="password" name="contrasenya" id="" required placeholder="Introdueix la teva contrasenya">
        <br>
        <input type="submit" name="submit" value="Entrar">
    </form>

    <a href="register.php"><button>Registrat</button></a>
</body>
</html>