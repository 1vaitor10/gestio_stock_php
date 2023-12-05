<?php
class database {
    public static function connectar() {
        $conexion = new mysqli('localhost', 'root', '', 'gestio_de_stock');
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>