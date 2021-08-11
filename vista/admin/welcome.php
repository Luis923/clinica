<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles1.css">
    <title>Document</title>
</head>
<body>
    <?php
        /* session_start();
        if(!isset($_SESSION["usuario"])){
            header("location:login.php");
        } */
    ?> 
    <div id="main">
        <img class="" src="images/login.jpg" class="img-fluid" alt="login">
        <br><br><br>
        <div class="row justify-content-center">
            <div class="col-4 m-5 p-5" id="login">
                <p><a href="<?php echo urlsite ?>?page=logout">Cerrar sesion</a></p>
                <h1>
                <?php
                    echo "Bienvenido Doctor<br>";
                ?>
                </h1>
                <div class="mb-3">
                        <a class="btn btn-primary" href="<?php echo urlsite ?>?page=usuario&opcion=form_insertar" role="button">Agregar Usuario</a>
                </div>
                <div class="mb-3">
                        <a class="btn btn-primary" href="<?php echo urlsite ?>?page=paciente&opcion=form_insertar" role="button">Agregar Paciente</a>
                </div>
                <div class="mb-3">
                        <a class="btn btn-primary" href="<?php echo urlsite ?>?page=usuario" role="button">Ver resultados</a>
                </div>                          
            </div>
        </div>
    </div>

    <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="popper.min.js"></script>
</body>
</html>