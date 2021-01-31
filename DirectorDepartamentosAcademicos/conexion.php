<?php
    class conexion
    {
        private $servidor;
        private $usuario;
        private $pass;
        private $basedatos;
        public $conexion;
        public function __construct(){
                $this -> servidor="localhost";
                $this -> usuario="root";
                $this -> pass="";
                $this -> basedatos="aition";//aition
        }
        function conectar()
        {
            $this -> conexion = new mysqli($this -> servidor,$this->usuario,$this->pass,$this -> basedatos);
            $this -> conexion -> set_charset("utf8");
        }
        function cerrar()
        {
            $this -> conexion->close();
        }
    }


?>