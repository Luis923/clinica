<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        try{
            if(isset(($_POST["login"]))){
                if(isset($_POST["password"])){
                    $login=htmlentities(addslashes($_POST["login"]));
                    $password=htmlentities(addslashes($_POST["password"]));

                    $conexion = mysqli_connect("localhost","root","","bdclinica");
                    $sql="SELECT *FROM usuarios WHERE usuario = '$login' AND contraseña = '$password'";
                    $resultado =mysqli_query($conexion,$sql);                    
                    $filas=mysqli_num_rows($resultado);
                    if($filas){
                        session_start();
                        $_SESSION["usuario"]=$_POST["login"];
                        if($_POST["login"]=="Carlos123"){
                            header("location:doctor_registrado.php"); 
                        }
                        else{
                            header("location:paciente_registrado.php"); 
                        }
                                                                 
                    }
                    else{
                        header("location:index.php");/* redirige a otra pagina */   
                    }
                    mysql_free_result($resultado);
                    mysqli_close($conexion);
                }

            }

        }
        catch(expeption $e){
            die("error:" . $e ->get_Message());
        }
    ?>
</body>
</html>