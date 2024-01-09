<?php 

require_once "database.php";  
    class producte{   
        public $id;
        public $categoria;
        public $nombre;
        public $imagen;
        public $fecha;
        public $estanteria;
        public $Arxivat;
          
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of categoria
         */ 
        public function getCategoria()
        {
                return $this->categoria;
        }

        /**
         * Set the value of categoria
         *
         * @return  self
         */ 
        public function setCategoria($categoria)
        {
                $this->categoria = $categoria;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of fimagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of fimagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        /**
         * Get the value of data
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of data
         *
         * @return  self
         */ 
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

          /**
         * Get the value of estanteria
         */ 
        public function getEstanteria()
        {
                return $this->estanteria;
        }

        /**
         * Set the value of estanteria
         *
         * @return  self
         */ 
        public function setEstanteria($estanteria)
        {
                $this->estanteria = $estanteria;

                return $this;
        }

        /**
         * Get the value of Arxivat
         */ 
        public function getArxivat()
        {
                return $this->Arxivat;
        }

        /**
         * Set the value of Arxivat
         *
         * @return  self
         */ 
        public function setArxivat($Arxivat)
        {
                $this->Arxivat = $Arxivat;

                return $this;
        }
    

    public function mostrar(){
        $connexio = database::connectar();
        $sql = "SELECT * FROM productos";
        $result = mysqli_query($connexio, $sql);
        return $result;
    }
    public function insertar()
{
    $connexio = database::connectar();

    $categoria = mysqli_real_escape_string($connexio, $this->categoria);
    $nombre = mysqli_real_escape_string($connexio, $this->nombre);
    $fecha = mysqli_real_escape_string($connexio, $this->fecha);
    $estanteria = mysqli_real_escape_string($connexio, $this->estanteria);
    $arxivat = mysqli_real_escape_string($connexio, $this->Arxivat);

    // Procesar la imagen
    $imagen = $_FILES['imagen']['tmp_name'];
    $ruta_imagen = 'IMG/' . $_FILES['imagen']['name'];
    move_uploaded_file($imagen, $ruta_imagen);

    $sql = "INSERT INTO productos (categoria, nombre, fecha, estanteria, imagen, Arxivat) 
            VALUES ('$categoria', '$nombre', '$fecha', '$estanteria', '$ruta_imagen', '$arxivat')";
    $result = mysqli_query($connexio, $sql);

    return $result;
}
    public function mostrarperid(){
        $connexio = database::connectar();
        $sql = "SELECT * FROM productos WHERE id = $this->id";
        $result = mysqli_query($connexio, $sql);
        return $result;
        
    }
    public function actualitzar(){
        $connexio = database::connectar();
        
        $sql = "UPDATE productos SET categoria = '$this->categoria', nombre = '$this->nombre', fecha = '$this->fecha', estanteria = '$this->estanteria' , imagen= '$this->imagen',Arxivat= '$this->Arxivat' WHERE id = $this->id";
        $result = mysqli_query($connexio, $sql);
        return $result;
    }

}
    ?>
