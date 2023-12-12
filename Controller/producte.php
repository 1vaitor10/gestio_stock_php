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
}
?>