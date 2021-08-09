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
    <?php
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("location:login.php");
        }
    ?> 
    <div id="main">
    <img class="" src="images/login.jpg" class="img-fluid" alt="login">
        <br>
        <div class="row justify-content-center">
            <div class="col-4 p-5" id="login">
                <p><a href="cierre.php">Cerrar sesion</a></p>
                <p><a href="paciente_registrado.php">Inicio</a></p>
                <h1>MIS RESULTADOS</h1>  
                <br>
                <?php
                    try{

                        $usuario = $_SESSION["usuario"];
                        /* $resultado = $_SESSION["resultado"]; */

                        $conexion0 = mysqli_connect("localhost","root","","bdclinica");
                        $sql0="SELECT *FROM  usuarios WHERE usuario = '$usuario'";
                        $resultado0 =mysqli_query($conexion0,$sql0); 
                        $arreglo0 = mysqli_fetch_array($resultado0);
            
                        $conexion1 = mysqli_connect("localhost","root","","bdclinica");
                        $sql1="SELECT *FROM  paciente WHERE idusuario = '$arreglo0[0]'";
                        $resultado1 =mysqli_query($conexion1,$sql1); 
                        $arreglo1 = mysqli_fetch_array($resultado1);
                        
                        $conexion2 = mysqli_connect("localhost","root","","bdclinica");
                        $sql2="SELECT *FROM diagnostico WHERE idpaciente = '$arreglo1[0]'";
                        $resultado2 =mysqli_query($conexion2,$sql2); 
                
                        $nfilas = mysqli_num_rows ($resultado2);

                        print("<h3>Historial</h3>");


                        if ($nfilas > 0){
                            print ("<TABLE class='table'>\n");
                            print ("<THEAD class='table-dark'>\n");    
                            print ("<TR>\n");
                            print ("<TH>N°</TH>\n");
                            print ("<TH>FECHA</TH>\n");
                            print ("<TH>RESULTADO</TH>\n");
                            print ("</TR>\n");
                            print ("</THEAD>\n");
                            print ("<TBODY>\n");

                            for ($i=1; $i<=$nfilas; $i++)
                            {
                                $arreglo2 = mysqli_fetch_array($resultado2);

                                print ("<TR>\n");
                                print ("<TD>" . $i . "</TD>\n");
                                print ("<TD>" . $arreglo2['fecha'] . "</TD>\n");
                                print ("<TD CLASS='result'>" . $arreglo2['resultado'] . "</TD>\n"); 
                                

                                print ("</TR>\n");
                            }

                            print ("</TBODY>\n");
                            print ("</TABLE>\n");
                        }

                        else{
                                print ("No hay datos disponibles");
                            
                        }

                        mysqli_close($conexion0);
                        mysqli_close($conexion1);
                        mysqli_close($conexion2); 

                         

                    }
                    catch(expeption $e){
                        die("error:" . $e ->get_Message());
                    }
                ?>
                <h3>Grafica</h3>
                <div>
                <canvas id="myChart"></canvas>
                </div>
                <script type="text/javascript" src="chartjs/chart.min.js"></script>
                <script>
                    var arreglo_enfermedades = []
                    var elements = document.getElementsByClassName('result');
                    for(var i=0; i<elements.length; i++) arreglo_enfermedades.push(elements[i].textContent)
                    var nameList = arreglo_enfermedades.join()
                    console.log(arreglo_enfermedades);
                    cont_pie = 0;
                    cont_juanetes = 0;
                    cont_fascitis = 0;
                    cont_verrugaplantar = 0;
                    cont_tendinitisaquilea = 0;
                    cont_callos = 0;

                    for (let i = 0; i < arreglo_enfermedades.length; i++) {
                        if(arreglo_enfermedades[i] == "pieatleta"){
                            cont_pie++;
                        }
                        else if(arreglo_enfermedades[i] == "juanetes"){
                            cont_juanetes++;
                        }
                        else if(arreglo_enfermedades[i] == "fascitis"){
                            cont_fascitis++;
                        }
                        else if(arreglo_enfermedades[i] == "verrugaplantar"){
                            cont_verrugaplantar++;
                        }
                        else if(arreglo_enfermedades[i] == "callos"){
                            cont_callos++;
                        }
                        else{

                        }
                        
                    }

                    const labels = [
                    'Pie de atleta',
                    'Juanetes',
                    'Fascitis',
                    'verruga plantar',
                    'tendinitis aquilea',
                    'callos',
                    ];
                    const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad de diagnosticos realizados',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [cont_pie, cont_juanetes, cont_fascitis,cont_verrugaplantar,cont_tendinitisaquilea,cont_callos],
                    }]
                    };
                    const config = {
                    type: 'line',
                    data,
                    options: {}
                    };

                // === include 'setup' then 'config' above ===

                var myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
                </script> 
                             
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>