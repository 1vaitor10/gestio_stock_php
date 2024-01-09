<?php 

require_once "database.php";  
    class prestec{   
        public $id;
        public $id_producto;
        public $id_usuario;
        public $nombre_usuario;
        public $cantidad_productos;
        public $data;

    
    public function mostrar(){
        $connexio = database::connectar();
        $sql = "SELECT * FROM `prestec`";
        $result = mysqli_query($connexio, $sql);
        return $result;
    }
    public function insertar(){
        $connexio = database::connectar();
        $sql = "INSERT INTO prestec (id, id_producto,id_usuario,nombre_usuario, cantidad_productos,data) VALUES ('$this->id', '$this->id_producto', '$this->id_usuario','$this->nombre_usuario', '$this->cantidad_productos','$this->data')";
        $result = mysqli_query($connexio, $sql);
        return $result;

    }
    public function mostrarperid(){
        $connexio = database::connectar();
        $sql = "SELECT * FROM prestec WHERE id = $this->id";
        $result = mysqli_query($connexio, $sql);
        return $result;
    }
    public function eliminar(){
        $connexio = database::connectar();
        $sql = "DELETE FROM prestec WHERE id = $this->id";
        $result = mysqli_query($connexio, $sql);
        return $result;
    }


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
         * Get the value of id_producto
         */ 
        public function getId_producto()
        {
                return $this->id_producto;
        }

        /**
         * Set the value of id_producto
         *
         * @return  self
         */ 
        public function setId_producto($id_producto)
        {
                $this->id_producto = $id_producto;

                return $this;
        }

        /**
         * Get the value of id_usuario
         */ 
        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        /**
         * Set the value of id_usuario
         *
         * @return  self
         */ 
        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;

                return $this;
        }

        /**
         * Get the value of nombre_usuario
         */ 
        public function getNombre_usuario()
        {
                return $this->nombre_usuario;
        }

        /**
         * Set the value of nombre_usuario
         *
         * @return  self
         */ 
        public function setNombre_usuario($nombre_usuario)
        {
                $this->nombre_usuario = $nombre_usuario;

                return $this;
        }

        /**
         * Get the value of cantidad_productos
         */ 
        public function getCantidad_productos()
        {
                return $this->cantidad_productos;
        }

        /**
         * Set the value of cantidad_productos
         *
         * @return  self
         */ 
        public function setCantidad_productos($cantidad_productos)
        {
                $this->cantidad_productos = $cantidad_productos;

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
        }

    ?>
