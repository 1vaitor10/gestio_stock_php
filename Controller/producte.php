<?php 
require_once 'model/producte.php';

class producteController {

    public function mostrartot() {
        $producte = new producte();
        $productes = $producte->mostrar();
        require_once "views/producte/mostrar.php";
    }
}
?>