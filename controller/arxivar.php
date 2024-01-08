<?php 
require_once 'model/arxivar.php';

class arxivarController {

    public function mostrarse() {
        $arxivar = new arxivar();
        $arxivars = $arxivar->mostrar();
        require_once "Views/arxivar/mostrar.php";
    }
    public function insertar(){
        require_once "Views/arxivar/insertar.php";
    }
    public function crear() {
        $arxivar = new arxivar();
        $arxivar->setCategoria($_POST["categoria"]);
        $arxivar->setNombre($_POST["nombre"]);
        $arxivar->setImagen($_POST["imagen"]);
        $arxivar->setFecha($_POST["fecha"]);
        $arxivar->setEstanteria($_POST["estanteria"]);
        $arxivar->setArxivat($_POST["Arxivat"]);
    

        $arxivar->insertar();
        header("Location:index.php?controller=arxivar&action=mostrarse");
    }
    public function actualitzar(){
        $arxivar = new arxivar();
        $arxivar->setId($_GET["id"]);
        $resultat = $arxivar->mostrarperid();
        $row = $resultat->fetch_assoc();
        require_once "Views/arxivar/actualitzar.php";
    }
     
    public function modificar(){
        $arxivar = new arxivar();
        $arxivar->setId($_POST["id"]);
        $arxivar->setCategoria($_POST["categoria"]);
        $arxivar->setNombre($_POST["nombre"]);
        $arxivar->setImagen($_POST["imagen"]);
        $arxivar->setFecha($_POST["fecha"]);
        $arxivar->setEstanteria($_POST["estanteria"]);
        $arxivar->setArxivat($_POST["Arxivat"]);
        $arxivar->actualitzar();
        header("Location: index.php?controller=arxivar&action=mostrarse");
    }
       
}
?>