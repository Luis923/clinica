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
        <br>
        <div class="row justify-content-center">
            <div class="col-4 p-5" id="login">
                <p><a href="<?php echo urlsite ?>?page=logout">Cerrar sesion</a></p>
                <p><a href="<?php echo urlsite ?>?page=paciente">Inicio</a></p>
                <h1>MIS RESULTADOS</h1>  
                <br>
                <TABLE class='table'>
                <THEAD class='table-dark'>
                <TR>
                <TH>N°</TH>
                <TH>FECHA</TH>
                <TH>RESULTADO</TH>
                </TR>
                </THEAD>
                <TBODY>
                <?php foreach($datos as $v): ?>
                    <TR> 
                    <TD><?php echo $v->iddiagnostico ?></TD>
                    <TD CLASS='fechas'><?php echo $v->fecha ?></TD>
                    <TD CLASS='result'><?php echo $v->resultado ?></TD>
                    </TR>
                <?php endforeach?>
                </TBODY>
                </TABLE>

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