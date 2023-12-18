<?php 

require_once "database.php";  
    class producte{   
        public $id;
        public $categoria;
        public $nombre;
        public $imagen;
        public $fecha;
        public $estanteria;
          
     
        
    
        


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
    
    public function mostrar(){
        $connexio = database::connectar();
        $sql = "SELECT * FROM productos";
        $result = mysqli_query($connexio, $sql);
        return $result;
    }
    public function insertar(){
        $connexio = database::connectar();
        $sql = "INSERT INTO productos (categoria, nombre, fecha,estanteria, imagen) VALUES ('$this->categoria', '$this->nombre', '$this->fecha','$this->estanteria', '$this->imagen')";
        $result = mysqli_query($connexio, $sql);
        return $result;

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
}
    ?>
