
<!-- Modal de Registro -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
               
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
                    <video id="video" width="640" height="480" autoplay></video>
                    <br>
                    <button id="captureButton" class="btn btn-primary">Capturar Foto</button>
                    <canvas id="canvas" width="640" height="480"></canvas>
                    <img id="capturedImage" style="display: none;" class="img-fluid" alt="Captured Image">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var video = document.getElementById('video');
        var canvas = document.getElementById('canvas');
        var captureButton = document.getElementById('captureButton');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function (stream) {
                video.srcObject = stream;
            })
            .catch(function (error) {
                console.error('Error al activar la cámara:', error);
            });

        captureButton.addEventListener('click', function () {
            var context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Aquí puedes enviar la imagen capturada al servidor junto con la información del formulario de registro.
            // Ajusta el código según las necesidades de tu backend.

            // Supongamos que tienes un archivo upload.php en el servidor.
            fetch('upload.php', {
                method: 'POST',
                body: new FormData(document.getElementById('registerForm'))
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error('Error al enviar la imagen:', error));
        });
    });
</script>

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
    </form>      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
  
        <?php
            if(isset($_POST['submit'])){
                $nom = $_POST['nom'];
                $contrasenya = $_POST['contrasenya'];
                $contrasenya2 = $_POST['contrasenya2'];
                if($contrasenya == $contrasenya2){
                    echo "111";
                    $server = "victq1-loginphp.db.tb-hosting.com";
                    $user = "victq1_vinvernon";
                    $password = "18ntJA23";
                    $dbname = "victq1_loginphp";
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
