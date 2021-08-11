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
            <div class="col-4 m-5 p-5" id="login" >
                <p><a href="<?php echo urlsite ?>?page=logout">Cerrar sesion</a></p>
                <p><a href="<?php echo urlsite ?>?page=admin">Inicio</a></p>
                <h1>DATOS DEL NUEVO USUARIO</h1>  
                <form action="<?php echo urlsite ?>?page=paciente&opcion=insertar" enctype="multipart/form-data" method="post">
                <div class="mb-3">
                        <label for="nombre" class="form-label">nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">apellidos</label>
                        <input type="text" class="form-control" name="apellidos">
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="number" class="form-control" name="dni">
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">edad</label>
                        <input type="number" class="form-control" name="edad">
                    </div>
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="login">
                    </div>
                    <button type="submit" name="agregar" class="btn btn-primary" value="Agregar">Agregar</button>
                </form>                       
            </div>
        </div>
    </div>

    <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="popper.min.js"></script>
</body>
</html>