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
            $login = $_REQUEST["login"];
            $password = $_REQUEST["password"];
            
            $conexion = mysqli_connect("localhost","root","","bdclinica");
            $sql="INSERT INTO usuarios VALUES (default,'$login','$password')";
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