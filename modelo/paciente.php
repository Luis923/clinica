<?php
    require "modelo/conexion.php";
    class Paciente{
        private $_db;
        public function __construct(){
            $this->_db = new Conexion();
        }
        public function buscar($usuario){
            $this->_db->conectar();
            $consulta = $this->_db->conexion->prepare("SELECT *FROM  usuarios WHERE usuario = '$usuario'");
            $consulta -> execute();
            $row=$consulta ->fetch(PDO::FETCH_OBJ);
            $this->_db->desconectar();

            $this->_db->conectar();
            $consulta2 = $this->_db->conexion->prepare("SELECT *FROM  paciente WHERE idusuario = '$row->idusuario'");
            $consulta2 -> execute();
            $row2=$consulta2 ->fetch(PDO::FETCH_OBJ);
            $this->_db->desconectar();

            $this->_db->conectar();
            $consulta3 = $this->_db->conexion->prepare("SELECT *FROM diagnostico WHERE idpaciente = '$row2->idpaciente'");
            $consulta3 -> execute();
            while($row3=$consulta3 ->fetch(PDO::FETCH_OBJ)){
                $this->lista[]= $row3;
            }
            $this->_db->desconectar();
            return $this->lista;
        }
        public function insertar($data){ 
            $this->_db->conectar();
            $consulta = $this->_db->conexion->query("SELECT *FROM  usuarios WHERE usuario = '$data[4]'");
            $consulta -> execute();
            $row=$consulta ->fetch(PDO::FETCH_OBJ);
            $this->_db->desconectar();
            
            $this->_db->conectar();
            $consulta2 = $this->_db->conexion->query("INSERT paciente VALUES(default,'$data[0]','$data[1]','$data[2]','$data[3]','$row->idusuario')");
            $this->_db->desconectar();
            if($consulta2)
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