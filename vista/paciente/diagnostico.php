<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta value="y" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
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
        <br>
        <div class="row justify-content-center">
            <div class="col-4 p-5" id="login">
                <p><a href="<?php echo urlsite ?>?page=logout">Cerrar sesion</a></p>
                <p><a href="<?php echo urlsite ?>?page=paciente">Inicio</a></p>
                <h3>EVALUACION DIAGNOSTICA</h3>  

                <P>¿Presenta picazon en el pie?</P>
                <select class="form-select" aria-label="Default select example" id="preg1">
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                <P>¿Presenta mal olor de pies?</P>
                <select class="form-select" aria-label="Default select example" id="preg2">
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                <P>¿Presenta ardor en los pies?</P>
                <select class="form-select" aria-label="Default select example" id="preg3">
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                <P>¿Tiene descamacion en el pie?</P>
                <select class="form-select" aria-label="Default select example" id="preg4">
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                <P>¿Presenta piel engrosada en el pie?</P>
                <select class="form-select" aria-label="Default select example" id="preg5">
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                <P>¿La piel del pie tiene tonalidad amarillenta?</P>
                <select class="form-select" aria-label="Default select example" id="preg6">
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                <P>¿Presenta abultamiento en la base del dedo gordo del pie?</P>
                <select class="form-select" aria-label="Default select example" id="preg7">
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                <P>¿Tiene dolor en el talón del pie?</P>
                <select class="form-select" aria-label="Default select example" id="preg8" >
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                <P>¿Presenta hinchazón en el talón?</P>
                <select class="form-select" aria-label="Default select example" id="preg9" >
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                <P>¿Presenta dolor en la planta del pie?</P>
                <select class="form-select" aria-label="Default select example" id="preg10" >
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                <P>¿Presenta puntitos negros en el pie?</P>
                <select class="form-select" aria-label="Default select example" id="preg11" >
                <option selected>OPCION</option>
                <option value="y">SI</option>
                <option value="n">NO</option>
                </select>
                <br>
                
                <!-- Program -->
                <textarea class="example-textinput example-program" id="program">
                sintomas(ynnnnnnnnnn,pieatleta).
                sintomas(yynnnnnnnnn,pieatleta).
                sintomas(yyynnnnnnnn,pieatleta).
                sintomas(yyyynnnnnnn,pieatleta).
                sintomas(ynynnnnnnnn,pieatleta).
                sintomas(ynyynnnnnnn,pieatleta).
                sintomas(nyyynnnnnnn,pieatleta).
                sintomas(nynnnnnnnnn,pieatleta).
                sintomas(ynnnnynnnnn,pieatleta).
                sintomas(yynnnynnnnn,pieatleta).
                sintomas(yyynnynnnnn,pieatleta).
                sintomas(yyyynynnnnn,pieatleta).
                sintomas(ynynnynnnnn,pieatleta).
                sintomas(ynyynynnnnn,pieatleta).
                sintomas(nyyynynnnnn,pieatleta).
                sintomas(nynnnynnnnn,pieatleta).
                sintomas(ynnnynnnnnn,pieatleta).
                sintomas(yynnynnnnnn,pieatleta).
                sintomas(yyynynnnnnn,pieatleta).
                sintomas(yyyyynnnnnn,pieatleta).
                sintomas(ynynynnnnnn,pieatleta).
                sintomas(ynyyynnnnnn,pieatleta).
                sintomas(nyyyynnnnnn,pieatleta).
                sintomas(nynnynnnnnn,pieatleta).
                sintomas(yyynyynnnnn,pieatleta).
                sintomas(yyyyyynnnnn,pieatleta).
                sintomas(ynynyynnnnn,pieatleta).
                sintomas(ynyyyynnnnn,pieatleta).
                sintomas(nyyyyynnnnn,pieatleta).
                sintomas(nynnyynnnnn,pieatleta).
                sintomas(nnnnynnnnyy,verrugaplantar).
                sintomas(nnnnnnnnnyy,verrugaplantar).
                sintomas(nnnnynnnnny,verrugaplantar).
                sintomas(nnnyynnnnyy,verrugaplantar).
                sintomas(nnnynnnnnyy,verrugaplantar).
                sintomas(nnnyynnnnny,verrugaplantar).
                sintomas(nnnnnnnynnn,tendinitisaquilea).
                sintomas(nnnnnnnyynn,tendinitisaquilea).
                sintomas(nnnnnnnnynn,tendinitisaquilea).
                sintomas(nnynnnnynnn,tendinitisaquilea).
                sintomas(nnynnnnyynn,tendinitisaquilea).
                sintomas(nnynnnnnynn,tendinitisaquilea).
                sintomas(nnnnnynnnnn,juanetes).
                sintomas(nnnynynnnnn,juanetes).
                sintomas(nnnyyynnnnn,callos).
                sintomas(nnnnyynnnnn,callos).
                sintomas(nnnyynnnnnn,callos).
                sintomas(nnynnnnyyyn,fascitis).
                sintomas(nnnnnnnyyyn,fascitis).
                sintomas(nnnnnnnnyyn,fascitis).
                sintomas(nnnnnnnynyn,fascitis).
                sintomas(nnynnnnnnyn,fascitis).
                sintomas(nnynnnnnyyn,fascitis).
                sintomas(nnynnnnynyn,fascitis).
                </textarea>

                <!-- Button -->
                <input class="btn btn-primary" type="button" value="Ver resultado" id="button" onClick="clickButton();" />
                <br>
                <br>
                <!-- Answers -->
                <div class="example-result" id="result"></div>
                <br>
                <br>
                <form action="enviar_diagnostico.php" method="post">
                    <input type="text" class="form-control" name="resultado" id="resultado">
                    <br>
                    <button type="submit" name="enviar" class="btn btn-primary" value="Enviar">Enviar diagnostico</button>
                </form>

                       
            </div>
        </div>
    </div>  

    <script type="text/javascript" src="./tau-prolog/node_modules/tau-prolog/modules/core.js"></script>
    <script type="text/javascript" src="./tau-prolog/node_modules/tau-prolog/modules/dom.js"></script>
    <script type="text/javascript" src="index2.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>