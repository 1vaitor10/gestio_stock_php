<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Cámara</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5iq6U2z7U3e9aRS3nTmI9gAOp6usjov3V+NMlZA9b6EGGoI1Wwr5QkdA1d1X" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <form class="form-control" action="index.php?controller=producte&action=crear" method="post">

        <label for="categoria">Categoría</label>
        <input class="form-control" type="text" name="categoria" id="categoria" required>

        <label for="nombre">Nombre</label>
        <input class="form-control" type="text" name="nombre" id="nombre" required>

        <label for="fecha">Fecha</label>
        <input class="form-control" type="date" name="fecha" id="fecha" required>

        <label for="estanteria">Estantería</label>
        <input class="form-control" type="text" name="estanteria" id="estanteria" required>

        <label for="imagen">Imagen</label>
        <input class="form-control" type="text" name="imagen" id="imagen" required>

        <!-- Nuevo campo para la cámara -->
        <label for="camara">Cámara</label>
        <video id="camara" class="form-control" autoplay playsinline></video>
        <button type="button" id="tomarFoto" class="btn btn-primary">Tomar Foto</button>

        <!-- Campo oculto para almacenar la foto en formato base64 -->
        <input type="hidden" name="foto" id="foto">

        <!-- Mostrar la foto tomada (opcional) -->
        <img id="fotoMostrada" class="img-fluid" style="display: none;">

        <input class="form-control" type="submit" value="Insertar">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script>
    // Código JavaScript para la cámara
    const camara = document.getElementById('camara');
    const tomarFotoBtn = document.getElementById('tomarFoto');
    const fotoInput = document.getElementById('foto');
    const fotoMostrada = document.getElementById('fotoMostrada');

    // Obtener el flujo de video de la cámara
    navigator.mediaDevices.getUserMedia({ video: true })
        .then((stream) => {
            camara.srcObject = stream;
        })
        .catch((error) => {
            console.error('Error al acceder a la cámara: ', error);
        });

    // Tomar una foto cuando se hace clic en el botón
    tomarFotoBtn.addEventListener('click', () => {
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        context.drawImage(camara, 0, 0, canvas.width, canvas.height);

        // Convertir la imagen a formato base64
        const fotoBase64 = canvas.toDataURL('image/png');

        // Mostrar la foto (opcional)
        fotoMostrada.src = fotoBase64;
        fotoMostrada.style.display = 'block';

        // Asignar la imagen al campo oculto
        fotoInput.value = fotoBase64;
    });
</script>

</body>
</html>
