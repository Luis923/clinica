<?php
require "modelo/diagnostico.php";
class DiagnosticoController{
    public static function listar(){
        session_start();  
        if(!isset($_SESSION["login"])){
            header('location:'.urlsite);
        }
        $paciente = new Paciente();
        $usuario = $_SESSION["login"];
        $datos = $paciente->buscar($usuario); 
        require "vista/paciente/resultados.php";
    }

    public static function form_insertar(){
        session_start();
        if(!isset($_SESSION["login"])){
            header('location:'.urlsite);
        }
        require "vista/paciente/diagnostico.php";
        
    }
    public static function form_resultados(){
        $paciente = new Paciente();
        session_start();
        if(!isset($_SESSION["login"])){
            header('location:'.urlsite);
        }
        $usuario = $_SESSION["login"];
        $datos = $paciente->buscar($usuario); 
        require "vista/paciente/resultados.php";
    }

    public static function insertar(){
        $_resultado = $_REQUEST["resultado"];
        session_start();
        $usuario = $_SESSION["login"];

        $diagnostico = new Diagnostico();
        $data       = $_resultado;
        $accion     = $diagnostico->insertar($data,$usuario);
        echo $accion;

        
        if($accion){
            header('location:'.urlsite."?page=diagnostico&opcion=form_insertar");
        }
        else
            header('location:'.urlsite."?page=diagnostico&opcion=form_insertar&msg=No se pudo insertar");
    }

    public static function form_editar(){
        $usuario = new Usuario();
        $datos = $usuario->buscar("id=".$_REQUEST['id']);
        require "vista/admin/usuario/editar.php";

    }
    public static function editar(){
        $_usuario = $_REQUEST['txtusuario'];
        $_contraseña = $_REQUEST['txtcontraseña'];

        $usuario = new Usuario();
        $data   = "usuario='".$_usuario."',contraseña='".$_contraseña;
        $accion     = $usuario->actualizar($data,"id=".$id);

        if($accion){
            header('location:'.urlsite."?page=usuario");
        }
        else{
            header('location:'.urlsite."?page=usuario&opcion=form_editar&msg=No se pudo actualizar");
        }
    }
    public static function eliminar(){
        $usuario = new Usuario();
        $datos = $usuario->eliminar("id=".$_REQUEST['id']);
        header('location:'.urlsite."?page=usuario");
    }
}           
?>