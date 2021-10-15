<?php
require "modelo/usuario.php";
class UsuarioController{
    public static function listar(){
        $usuario = new Usuario();
        $datos = $usuario->buscar(); 
        session_start();
        if(!isset($_SESSION["login"])){
            header('location:'.urlsite);
        }
        require "vista/admin/usuario/listado.php";
    }

    public static function form_insertar(){
        session_start();
        if(!isset($_SESSION["login"])){
            header('location:'.urlsite);
        }
        require "vista/admin/usuario/nuevo.php";
    }

    public static function insertar(){ 
        $_usuario= $_REQUEST['txtusuario'];
        $_contraseña = $_REQUEST['txtcontraseña'];

        $usuario = new Usuario();
        $data       = [$_usuario,$_contraseña];
        $accion     = $usuario->insertar($data);
        
        if($accion){
            header('location:'.urlsite."?page=usuario&opcion=form_insertar");
        }
        else
            header('location:'.urlsite."?page=usuario&opcion=form_insertar&msg=No se pudo insertar");
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