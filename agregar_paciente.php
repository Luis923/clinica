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

            $login=htmlentities(addslashes($_POST["login"]));
            $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];
            $dni = $_REQUEST["dni"];
            $edad = $_REQUEST["edad"];

            $conexion0 = mysqli_connect("localhost","root","","bdclinica");
            $sql0="SELECT *FROM  usuarios WHERE usuario = '$login'";
            $resultado0 =mysqli_query($conexion0,$sql0); 
            $arreglo = mysqli_fetch_array($resultado0);
            
            $conexion = mysqli_connect("localhost","root","","bdclinica");
            $sql="INSERT INTO paciente VALUES (default,'$nombre','$apellidos','$dni','$edad','$arreglo[0]')";
            $resultado =mysqli_query($conexion,$sql);                    
            mysqli_close($conexion); 

            header("location:doctor_registrado.php");


        }
        catch(expeption $e){
            die("error:" . $e ->get_Message());
        }
    ?>
</body>
</html>