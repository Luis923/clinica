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
                <p><a href="doctor_registrado.php">Inicio</a></p>
                <h5>RESULTADOS DE LOS PACIENTES</h5>  
                <br>
                <?php
                    try{

                        $usuario = $_SESSION["usuario"];

                        $conexion2 = mysqli_connect("localhost","root","","bdclinica");
                        $sql2="SELECT *FROM diagnostico INNER JOIN paciente WHERE diagnostico.idpaciente = paciente.idpaciente";
                        $resultado2 =mysqli_query($conexion2,$sql2); 
                        $nfilas = mysqli_num_rows ($resultado2);
                        
                        print("<h5>Reporte</h5>");

                        if ($nfilas > 0){
                            print ("<TABLE class='table'>\n");
                            print ("<THEAD class='table-dark'>\n");    
                            print ("<TR>\n");
                            print ("<TH>N°</TH>\n");
                            print ("<TH>FECHA</TH>\n");
                            print ("<TH>PACIENTE</TH>\n");
                            print ("<TH>RESULTADO</TH>\n");
                            print ("</TR>\n");
                            print ("</THEAD>\n");
                            print ("<TBODY>\n");

                            for ($i=1; $i<=$nfilas; $i++)
                            {
                                $arreglo2 = mysqli_fetch_array($resultado2);

                                print ("<TR>\n");
                                print ("<TD>" . $i . "</TD>\n");
                                print ("<TD CLASS='fechas'>" . $arreglo2['fecha'] . "</TD>\n");
                                print ("<TD>" . $arreglo2['nombre'] . "</TD>\n");
                                print ("<TD>" . $arreglo2['resultado'] . "</TD>\n"); 
                                

                                print ("</TR>\n");
                            }

                            print ("</TBODY>\n");
                            print ("</TABLE>\n");
                        }

                        else{
                                print ("No hay datos disponibles");
                            
                        }

                        mysqli_close($conexion2); 

                         

                    }
                    catch(expeption $e){
                        die("error:" . $e ->get_Message());
                    }
                ?> 
                <h5>Datos generales</h5>
                <div>
                <canvas id="myChart"></canvas>
                </div>
                <script type="text/javascript" src="chartjs/chart.min.js"></script>
                <script>
                    var arreglo_fechas = []
                    var elements = document.getElementsByClassName('fechas');
                    for(var i=0; i<elements.length; i++) arreglo_fechas.push(elements[i].textContent)
                    var nameList = arreglo_fechas.join()
                    console.log(arreglo_fechas);
                    cont_enero = 0;
                    cont_febrero = 0;
                    cont_marzo = 0;
                    cont_abril = 0;
                    cont_mayo = 0;
                    cont_junio = 0;
                    cont_julio = 0;
                    cont_agosto = 0;
                    cont_septiembre = 0;
                    cont_octubre = 0;
                    cont_noviembre = 0;
                    cont_diciembre = 0;

                    for (let i = 0; i < arreglo_fechas.length; i++) {
                        console.log(arreglo_fechas[i].slice(5,7));
                        if(arreglo_fechas[i].slice(5,7) == "01"){
                            cont_enero++;
                        }
                        else if(arreglo_fechas[i].slice(5,7) == "02"){
                            cont_febrero++;
                        }
                        else if(arreglo_fechas[i].slice(5,7) == "03"){
                            cont_marzo++;
                        }        
                        else if(arreglo_fechas[i].slice(5,7) == "04"){
                            cont_abril++;
                        }
                        else if(arreglo_fechas[i].slice(5,7) == "05"){
                            cont_mayo++;
                        }
                        else if(arreglo_fechas[i].slice(5,7) == "06"){
                            cont_junio++;
                        }
                        else if(arreglo_fechas[i].slice(5,7) == "07"){
                            cont_julio++;
                        }
                        else if(arreglo_fechas[i].slice(5,7) == "08"){
                            cont_agosto++;
                        }
                        else if(arreglo_fechas[i].slice(5,7) == "09"){
                            cont_septiembre++;
                        }
                        else if(arreglo_fechas[i].slice(5,7) == "10"){
                            cont_octubre++;
                        }                        
                        else if(arreglo_fechas[i].slice(5,7) == "11"){
                            cont_noviembre++;
                        }
                        
                        else {
                            cont_diciembre++;
                        }                    
                    }


                    const labels = [
                    'Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre',
                    ];
                    const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Tendencia del uso del diagnostico',
                        backgroundColor: 'rgb(0, 99, 132)',
                        borderColor: 'rgb(0, 99, 132)',
                        data: [cont_enero,cont_febrero,cont_marzo,cont_abril,cont_mayo,cont_junio,cont_julio,cont_agosto,cont_septiembre,cont_octubre,cont_noviembre,cont_diciembre],
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