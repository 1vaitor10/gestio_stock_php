<?php 
require_once 'model/producte.php';

class producteController {

    public function mostrartot() {
        $producte = new producte();
        $productes = $producte->mostrar();
        require_once "Views/Producte/mostrar.php";
    }
    public function insertar(){
        require_once "Views/Producte/insertar.php";
    }
    public function crear() {
        $producte = new producte();
        $producte->setCategoria($_POST["categoria"]);
        $producte->setNombre($_POST["nombre"]);
        $producte->setImagen($_POST["imagen"]);
        $producte->setFecha($_POST["fecha"]);
    

        $producte->insertar();
        header("Location:index.php?controller=producte&action=mostrartot");
    }
}
?>