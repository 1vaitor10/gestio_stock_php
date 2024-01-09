<?php 
require_once 'model/prestec.php';

class prestecController {

    public function mostrarse() {
        $prestec = new prestec();
        $prestecs = $prestec->mostrar();
        require_once "Views/prestec/mostrar.php";
    }
    public function insertar(){
        require_once "Views/prestec/insertar.php";
    }
    public function crear() {
        $prestec = new prestec();
        $prestec->setId($_POST["id"]);
        $prestec->setId_producto($_POST["id_producto"]);
        $prestec->setId_usuario($_POST["id_usuario"]);
        $prestec->setNombre_usuario($_POST["nombre_usuario"]);
        $prestec->setCantidad_productos($_POST["cantidad_productos"]);
        echo ($_POST["data"]);
        $prestec->setData($_POST["data"]);
        
        
    

        $prestec->insertar();
        header("Location:index.php?controller=prestec&action=mostrarse");
    }
    public function actualitzar(){
        $prestec = new prestec();
        $prestec->setId($_GET["id"]);
        $resultat = $prestec->mostrarperid();
        $row = $resultat->fetch_assoc();
        require_once "Views/prestec/actualitzar.php";
    }
     
    public function eliminar(){
        $prestec = new prestec();
        $prestec->setId($_GET["id"]);
        $prestec->eliminar();
        header("Location: index.php?controller=prestec&action=mostrarse");
    }
       
}
?>