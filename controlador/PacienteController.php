<?php
require "modelo/paciente.php";
class PacienteController{
    public static function listar(){
        $paciente = new Paciente();
        $datos = $paciente->buscar();
        require "vista/paciente/listado.php";
    }

    public static function form_welcome(){
        require "vista/paciente/welcome.php";
    }
    public static function form_diagnosticar(){
        require "vista/paciente/diagnostico.php";
    }

    public static function form_insertar(){
        require "vista/paciente/nuevo.php";
    }

    public static function insertar(){
        $_nombre= $_REQUEST['txtnombre'];
        $_apellidos = $_REQUEST['txtapellidos'];
        $_dni = $_REQUEST['txtdni'];    
        $_edad = $_REQUEST['txtedad'];
        $_login = $_REQUEST['txtlogin'];

        $paciente = new Paciente();
        $data       = [$_nombre,$_apellidos,$_dni,$_edad,$_login];
        $accion     = $paciente->insertar($data);
        
        if($accion){
            header('location:'.urlsite."?page=paciente&opcion=form_insertar");
        }
        else
            header('location:'.urlsite."?page=paciente&opcion=form_insertar&msg=No se pudo insertar");
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