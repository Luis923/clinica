<?php
    session_start();
    require "modelo/login.php";
    class LoginController{
        public function index(){
            /* if(isset($_SESSION['login']))
                header('location:'.urlsite); */
            require "vista/front/formlogin.php";
        }
        public function login(){
            $_modelo = new Login();
            $_usuario = trim($_POST['txtusuario']);
            $_passw = trim($_POST['txtpassword']);
            $_resultado = $_modelo->login($_usuario,$_passw);
            
            if($_resultado){
                if($_usuario=="Carlos123"){
                    $_SESSION['login'] = $_usuario;
                    header('location:'.urlsite."?page=admin");
                }
                else{
                    $_SESSION['login'] = $_usuario;
                    header('location:'.urlsite."?page=paciente");
                }
                
            }
            else{
                header('location'.urlsite."?msg=No coinciden las credenciales");
            }
        }
        public function logout(){
            if(!isset($_SESSION['login']))
                header('location:'.urlsite);
            unset($_SESSION['login']);
            session_destroy();
            header('location:'.urlsite);
        }
    }
?>