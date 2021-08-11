<?php
    require "modelo/conexion.php";
    class Usuario{
        private $_db;
        public function __construct(){
            $this->_db = new Conexion();
        }
        public function buscar(){
            $this->_db->conectar();
            $consulta = $this->_db->conexion->prepare("SELECT *FROM diagnostico INNER JOIN paciente WHERE diagnostico.idpaciente = paciente.idpaciente");
            $consulta -> execute();
            while($row=$consulta ->fetch(PDO::FETCH_OBJ)){
                $this->lista[]= $row;
            }
            $this->_db->desconectar();
            return $this->lista;
        }
        public function insertar($data){           
            $this->_db->conectar();
            $consulta = $this->_db->conexion->query("INSERT usuarios VALUES(default,'$data[0]','$data[1]')");
            $this->_db->desconectar();
            if($consulta)
                return true;
            else   
                return false;
        }
        public function editar($data,$condicion){
            $this->_db = conectar();
            $consulta = $this->_db->conexion->query("UPDATE usuarios SET ".$data." WHERE ".$condicion);
            $this->_db->desconectar();
            if($consulta)
                return true;
            else   
                return false;
        }
        public function eliminar($condicion){
            $this->_db = conectar();
            $consulta = $this->_db->conexion->query("DELETE FROM usuarios WHERE ".$condicion);
            $this->_db->desconectar();
            if($consulta)
                return true;
            else   
                return false;
        }


    }
?>