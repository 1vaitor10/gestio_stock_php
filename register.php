<?php
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $contrasenya = $_POST['contrasenya'];
    $contrasenya2 = $_POST['contrasenya2'];

    // Agrega más validaciones según tus requisitos

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
            $contrasenya_hash = password_hash($contrasenya, PASSWORD_DEFAULT);

            $stmt = $db->prepare("INSERT INTO `usuarios` (`contraseña`, `nombre_usuario`) VALUES (?, ?)");
            $stmt->bind_param('ss', $nom, $contrasenya_hash);
            
            if ($stmt->execute()) {
                // Registro exitoso
                header("Location: login.php");
                exit();
            } else {
                // Manejo de errores
                echo "Error al registrar el usuario: " . $stmt->error;
            }

            $stmt->close();
            $db->close();
        }
    } else {
        echo "Registro fallido: Las contraseñas no coinciden";
    }
}
?>

<!-- Resto del código HTML permanece igual -->