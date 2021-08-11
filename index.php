<?php
    require "config.php";
    $page = "index";
    if(isset($_GET['page']))
        $page = $_GET['page'];
    switch($page){
        case 'login':
            require "controlador/LoginController.php";
            LoginController::index();
            break;
        case 'loginauth':
            require "controlador/LoginController.php";
            LoginController::login();
            break;
        case 'logout':
            require "controlador/LoginController.php";
            LoginController::logout();
            break;
        case 'admin':
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

        default: echo "<a href='".urlsite."?page=login'>LOGIN</a>"; break ;
    }

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div id="main">
        <img class="" src="images/login.jpg" class="img-fluid" alt="login">
        <br><br><br>
            <div class="row justify-content-center ">               
                <div class="col-3 m-5 p-5 " id="login" >                   
                    <h1>LOGIN</h1>
                    <form action="comprueba_login.php" method="post">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="login">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" name="enviar" class="btn btn-primary" value="Login">Login</button>
                    </form>
                </div>
            </div>      
    </div>

    <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="popper.min.js"></script>
</body>
</html> -->