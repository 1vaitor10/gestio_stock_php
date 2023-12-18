<?php
require_once 'model/producte.php';

class producteController {

    public function mostrartot() {
        $producte = new producte();
        $productes = $producte->mostrar();
        require_once "Views/Producte/mostrar.php";
    }

    public function insertar() {
        require_once "Views/Producte/insertar.php";
    }

    public function crear() {
        // Validar los datos de entrada
        if (empty($_POST["categoria"]) || empty($_POST["nombre"]) || empty($_POST["imagen"]) || empty($_POST["fecha"]) || empty($_POST["estanteria"])) {
            // Manejar el caso en que algunos campos estén vacíos
            echo "Por favor, complete todos los campos.";
            return;
        }

        // Sanitizar los datos de entrada para prevenir inyecciones SQL
        $categoria = htmlspecialchars($_POST["categoria"]);
        $nombre = htmlspecialchars($_POST["nombre"]);
        $imagen = htmlspecialchars($_POST["imagen"]);
        $fecha = htmlspecialchars($_POST["fecha"]);
        $estanteria = htmlspecialchars($_POST["estanteria"]);

        $producte = new producte();
        $producte->setCategoria($categoria);
        $producte->setNombre($nombre);
        $producte->setImagen($imagen);
        $producte->setFecha($fecha);
        $producte->setEstanteria($estanteria);

        // Insertar los datos en la base de datos
        $resultado = $producte->insertar();

        if ($resultado) {
            // Redirigir a la página de lista de productos en caso de inserción exitosa
            header("Location: index.php?controller=producte&action=mostrartot");
        } else {
            // Manejar el caso en que la inserción haya fallado
            echo "Error al insertar los datos. Por favor, inténtelo de nuevo.";
        }
    }
}
?>