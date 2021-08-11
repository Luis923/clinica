<?php
    require "config.php";
    $page = "index";
    if(isset($_GET['page']))
        $page = $_GET['page'];
    switch($page){
        case 'loginauth':
            require "controlador/LoginController.php";
            LoginController::login();
            break;
        case 'logout':
            require "controlador/LoginController.php";
            LoginController::logout();
            break;
        case 'admin':
            session_start();
            if(!isset($_SESSION["login"])){
            header('location:'.urlsite);
            }
            require "vista/admin/welcome.php";
            break;
        case 'usuario':
            require "controlador/UsuarioController.php";
            if(isset($_GET['opcion'])):
                $metodo = $_GET['opcion'];
                if(method_exists('UsuarioController',$metodo)):
                    UsuarioController::{$metodo}();
                endif;
            else:
                UsuarioController::listar();
            endif;
            break;
        case 'paciente':
                require "controlador/PacienteController.php";
                if(isset($_GET['opcion'])):
                    $metodo = $_GET['opcion'];
                    if(method_exists('PacienteController',$metodo)):
                        PacienteController::{$metodo}();
                    endif;
                else:
                    PacienteController::form_welcome();
                endif;
                break;
        
        case 'diagnostico':
                require "controlador/DiagnosticoController.php";
                
                if(isset($_GET['opcion'])):
                    $metodo = $_GET['opcion'];
                    if(method_exists('DiagnosticoController',$metodo)):
                        
                        DiagnosticoController::{$metodo}();
                    endif;
                else:
                    DiagnosticoController::form_insertar();
                endif;
                break;

        default:
            require "controlador/LoginController.php";
            LoginController::index();
            break; 
    }

?>