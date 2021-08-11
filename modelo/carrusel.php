<?php
    require "modelo/conexion.php";
    class Carrusel{
        private $_db;
        public function __construct(){
            $this->_db = new Conexion();
        }
        public function buscar($condicion){
            $this->_db = conectar();
            $consulta = $this->_db->conexion->prepare("SELECT * FROM carrusel WHERE".$condicion);
            $consulta -> execute();
            while($row=$consulta ->fetch(PDO::FETCH_OBJ)){
                $this->lista[]= $row;
            }
            $this->_db->desconectar();
            return $this->lista;
        }
        public function insertar($data){
            $this->_db = conectar();
            $consulta = $this->_db->conexion->query("INSERT carrusel VALUES(NULL,".$data.")");
            $this->_db->desconectar();
            if($consulta)
                return true;
            else   
                return false;
        }
        public function editar($data,$condicion){
            $this->_db = conectar();
            $consulta = $this->_db->conexion->query("UPDATE carrusel SET ".$data." WHERE ".$condicion);
            $this->_db->desconectar();
            if($consulta)
                return true;
            else   
                return false;
        }
        public function eliminar($condicion){
            $this->_db = conectar();
            $consulta = $this->_db->conexion->query("DELETE FROM carrusel WHERE ".$condicion);
            $this->_db->desconectar();
            if($consulta)
                return true;
            else   
                return false;
        }


    }
?>