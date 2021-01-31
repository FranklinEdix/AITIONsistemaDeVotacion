<?php include("db.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AITÍON</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <nav class="navbar navbar-light bg-light" style="background: rgb(0,0,0,.2); color:beige">
        <div class="container-fluid" style="display:block; text-align:center;">
            <h1><img src="img/undac.png" alt="" width="80" height="80"> SISTEMA DE VOTACIÓN AITÍON <img src="img/undac.png" alt="" width="80" height="80"></h1>
        </div>
    </nav>
    <div style="margin:-30px 30px; display: block; float:right;">
        <h1>
            <a href="indexLogin.html" class=""><button type="button" class="btn btn-danger" style="font-size: 25px;"><i class="glyphicon glyphicon-log-out" style="color: aliceblue;"></i></button></a>
        </h1>
    </div>
    <div style="display: flex;">
        <div class="page-content" style="margin: 50px 30px 0 30px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="sidebar content-box" style="display: block;">
                        <ul class="nav">
                            <!-- Main menu -->
                            <li><a href="indexAsambleaUniversitaria.php" style="font-size: 25px;"><i class="glyphicon glyphicon-hand-right"></i> Asamblea Universitaria </a></li>
                            <li><a href="indexConsejoUniversitario.php" style="font-size: 25px;"><i class="glyphicon glyphicon-hand-right"></i> Consejo Universitario </a></li>
                            <li><a <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listarector"; 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] > $fecha){ ?>
                                    href="indexRector.php"<?php
                                }else{
                                    ?> href="indexRectorMensaje.php" 
                                <?php } ?> style="font-size: 25px;"><i class="glyphicon glyphicon-hand-right"></i> Rector y Vicerrectores </a></li>
                            <li><a href="ConsejoFacultad/indexConsejoDeFacultad.php" style="font-size: 25px;"><i class="glyphicon glyphicon-hand-right"></i> Consejo de Facultad </a></li>
                            <li><a href="indexDirectorDeDepartamentosAcademicos.php" style="font-size: 25px;"><i class="glyphicon glyphicon-hand-right"></i> Director de Departamentos Academicos </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <img src="img/Estudiante.png" alt="" width="450" height="500" style="margin: auto auto auto 50px;">
        </div>
    </div>
</body>

</html>