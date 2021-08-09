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
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("location:login.php");
        }
    ?>
    <?php
    
        try{

            $resultado = $_REQUEST["resultado"];
            $_SESSION["resultado"] = $resultado;
            $usuario = $_SESSION["usuario"];
            $fecha = date('d-m-Y H:i:s');

            $conexion0 = mysqli_connect("localhost","root","","bdclinica");
            $sql0="SELECT *FROM  usuarios WHERE usuario = '$usuario'";
            $resultado0 =mysqli_query($conexion0,$sql0); 
            $arreglo0 = mysqli_fetch_array($resultado0);

            $conexion1 = mysqli_connect("localhost","root","","bdclinica");
            $sql1="SELECT *FROM  paciente WHERE idusuario = '$arreglo0[0]'";
            $resultado1 =mysqli_query($conexion1,$sql1); 
            $arreglo1 = mysqli_fetch_array($resultado1);
            
            $conexion = mysqli_connect("localhost","root","","bdclinica");
            $sql="INSERT INTO diagnostico VALUES (default,now(),'$resultado','$arreglo1[0]')";
            $resultado =mysqli_query($conexion,$sql);                    
            mysqli_close($conexion); 
            header("location:formulario_diagnostico.php");


        }
        catch(expeption $e){
            die("error:" . $e ->get_Message());
        }
    ?>
</body>
</html>