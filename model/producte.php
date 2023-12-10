<?php 

require_once "model/database.php";  
    class producte{   
        public $id;
        public $categoria;
        public $nombre;
        public $fimagen;
        public $data;
          
     
        
    
        


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
        public function getFimagen()
        {
                return $this->fimagen;
        }

        /**
         * Set the value of fimagen
         *
         * @return  self
         */ 
        public function setFimagen($fimagen)
        {
                $this->fimagen = $fimagen;

                return $this;
        }

        /**
         * Get the value of data
         */ 
        public function getData()
        {
                return $this->data;
        }

        /**
         * Set the value of data
         *
         * @return  self
         */ 
        public function setData($data)
        {
                $this->data = $data;

                return $this;
        }
    
    public function mostrar(){
        $connexio = database::connectar();
        $sql = "SELECT * FROM productos";
        $result = mysqli_query($connexio, $sql);
        return $result;
    }
}
    ?>
