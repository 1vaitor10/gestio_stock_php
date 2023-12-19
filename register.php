<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="post">
        <label for="nom">Nom</label><br>
        <input type="text" name="nom" id="" required placeholder="Introdueix el teu nom">
        <br>
        <br>
        <label for="contrasenya">Contrasenya</label><br>
        <input type="password" name="contrasenya" id="" required placeholder="Introdueix la teva contrasenya">
        <br>
        <br>
        <label for="contrasenya">Torna a introduir la contrasenya</label><br>
        <input type="password" name="contrasenya2" id="" required placeholder="Repeteix la teva contrasenya">
        <br>
        <br>
        <input type="submit" name="submit" value="Registrarse">
    </form>
        <?php
            if(isset($_POST['submit'])){
                $nom = $_POST['nom'];
                $contrasenya = $_POST['contrasenya'];
                $contrasenya2 = $_POST['contrasenya2'];
                if($contrasenya == $contrasenya2){
                    echo "111";
                    $server = "localhost";
                    $user = "root";
                    $password = "";
                    $dbname = "gestoi_de_stock";
                    // Conectar
                    $db = new mysqli($server, $user, $password, $dbname);
                    echo "222";
                    // Comprobar conexión
                    if($db->connect_error){
                        die("La conexión ha fallado, error número " . $db->connect_errno . ": " . $db->connect_error);
                    }
                    else{
                    $contrasenya=password_hash($contrasenya, PASSWORD_DEFAULT);
                    $stmt = $db->prepare("INSERT INTO `usuari` (`username`, `Contrasenya`) VALUES (?, ?)");
                    $stmt->bind_param('ss', $nom, $contrasenya);
                    $stmt->execute();
                    $stmt->close();
                    $db->close();

                    header("Location:login.php"); //Redirigir amb php
                    }
                }else{
                    echo "Registre Failed";
                }

            }
        ?>
    <a href="login.php"><button>Ya tengo cuenta</button></a>

</body>
</html>