<!DOCTYPE html>
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
                    <form action="<?php echo urlsite ?>?page=loginauth" method="post">
                        <div class="mb-3">
                            <label for="txtusuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="txtusuario">
                        </div>
                        <div class="mb-3">
                            <label for="txtpassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="txtpassword">
                        </div>
                        <button type="submit" name="enviar" class="btn btn-primary" value="Login">Login</button>
                    </form>
                    <p class="text-danger"><?php echo(isset($_GET['msg']))? $_GET['msg']:"" ?></p>
                </div>
            </div>      
    </div>

    <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="popper.min.js"></script>
</body>
</html>