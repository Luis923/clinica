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
    <div id="main">
    <img class="" src="images/login.jpg" class="img-fluid" alt="login">
        <br>
        <div class="row justify-content-center">
            <div class="col-6 p-5" id="login">
                <p><a href="<?php echo urlsite ?>?page=logout">Cerrar sesion</a></p>
                <p><a href="<?php echo urlsite ?>?page=admin">Inicio</a></p>
                <h5>RESULTADOS DE LOS PACIENTES</h5>  
                <br>
                <TABLE class='table'>
                <THEAD class='table-dark'>
                <TR>
                <TH>N°</TH>
                <TH>FECHA</TH>
                <TH>PACIENTE</TH>
                <TH>RESULTADO</TH>
                </TR>
                </THEAD>
                <TBODY> 
                <?php foreach($datos as $v): ?>
                    <TR> 
                    <TD><?php echo $v->iddiagnostico ?></TD>
                    <TD CLASS='fechas'><?php echo $v->fecha ?></TD>
                    <TD><?php echo $v->nombre ?></TD>
                    <TD><?php echo $v->resultado ?></TD>
                    <TD>
                        <!-- <a href="<?php echo urlsite ?>?page=categoria&opcion=form_editar&id=<?php /* echo $v->id */ ?>">Editar</a>
                        <a href="<?php echo urlsite ?>?page=categoria&opcion=eliminar&id=<?php /* echo $v->id */ ?>" onclick="return confirm('SEGURO?')">Eliminar</a> -->

                    </TD>
                    </TR>
                <?php endforeach?>
                </TBODY>
                </TABLE>
 
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