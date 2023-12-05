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

        $stmt = $db->prepare("SELECT `username`, `Contrasenya` FROM `usuari` WHERE `username`=? ");
        $stmt->bind_param('s', $nom);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $db->close();



        if (password_verify($contrasenya, $row['Contrasenya'])) {
            $_SESSION['nom'] = $nom;
            echo "Login Succes";
            echo  $_SESSION['nom'];
            header("Location:inici.php");
        }else{
            echo "les credencials son incorrectes";
        }
    }
    if (isset($_GET["logout"]) && $_GET["logout"] == 1) {
        session_destroy();
        header("Location:login.php");
    }
    ?>
    <a href="register.php"> <button>Registrat</button></a>