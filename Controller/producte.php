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
        $producte->setEstanteria($_POST["estanteria"]);
        $producte->setArxivat($_POST["Arxivat"]);
    

        $producte->insertar();
        header("Location:index.php?controller=producte&action=mostrartot");
    }
    public function actualitzar(){
        $producte = new producte();
        $producte->setId($_GET["id"]);
        $resultat = $producte->mostrarperid();
        $row = $resultat->fetch_assoc();
        require_once "Views/Producte/actualitzar.php";
    }
 
    public function modificar(){
        $producte = new producte();
        $producte->setId($_POST["id"]);
        $producte->setCategoria($_POST["categoria"]);
        $producte->setNombre($_POST["nombre"]);
        $producte->setImagen($_POST["imagen"]);
        $producte->setFecha($_POST["fecha"]);
        $producte->setEstanteria($_POST["estanteria"]);
        $producte->setArxivat($_POST["Arxivat"]);
        $producte->actualitzar();
        header("Location: index.php?controller=producte&action=mostrartot");
    }
       
}
?>