<?php 
    include("db.php");
    include("Variables.php");
    include("VariableGlobal.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AITÍON</title>
    <link rel="shortcut icon" href="logo/icono.ico" type="image/x-icon">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css">
</head>

<body >
 <!--<iframe id="video-background" width="560" height="315" src="//www.youtube.com/embed/t-32qUyS16U?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;html5=1&amp;allowfullscreen=true&amp;wmode=transparent" autoplay frameborder="0" allowfullscreen></iframe>
--> 
<video id="video-background" src="img/fondo1.mp4" autoplay loop playsinline muted></video>
<nav class="navbar navbar-light bg-light" style="background: rgb(0,0,0,.6); color:beige">
        <div class="container-fluid" style="display:block; text-align:center;">
            <h1><img src="img/undac_white.png" alt="" width="95" height="95"> SISTEMA DE VOTACIÓN AITÍON <img src="img/undac_white.png" alt="" width="95" height="95"></h1>
        </div>
    </nav>
    <div style="margin:-30px 30px; display: block; float:right;">
        <h1>
            <a href="indexLogin.html" class=""><button type="button" class="btn btn-danger" style="font-size: 25px;"><i class="glyphicon glyphicon-log-out" style="color: aliceblue;"></i></button></a>
        </h1>
    </div>
    <div style="display: flex;">
        <div class="page-content" style="margin: 50px 30px 0 70px; ">
            <div class="row">
                <div class="col-md-12" >
                    <div class="sidebar content-box" style="display: block; background: rgb(0,0,0,.7);">
                        <ul class="nav" >
                            <!-- Main menu -->
                            <li><a <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdTipoElecciones = '$tipoAsamblea'"; 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] >= $fecha){ ?>
                                    href="AsambleaUniversitaria/indexAsamblea.php"
                                    style="font-size: 25px; background:rgb(255,255,255,.3); border-radius: 10px;"<?php
                                }else{
                                    ?> href="AsambleaUniversitaria/indexAsambleaMensaje.php"
                                    style="font-size: 25px; background:rgb(220,20,60,.3); border-radius: 10px;"
                                <?php } ?> ><i class="glyphicon glyphicon-hand-right"></i> Asamblea Universitaria </a></li>
                            <li><a 
                            <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdTipoElecciones = '$tipoConsejoUniversitario'"; 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] >= $fecha){ ?>
                                style="font-size: 25px; background:rgb(255,255,255,.3); border-radius: 10px;"
                                    href="ConsejoUniversitario/indexConsejoUniversitario.php"<?php
                                }else{
                                    ?> href="ConsejoUniversitario/indexConsejoUniversitarioMensaje.php" 
                                    style="font-size: 25px; background:rgb(220,20,60,.3); border-radius: 10px;"
                                <?php } ?>
                            
                             style="font-size: 25px;"><i class="glyphicon glyphicon-hand-right"></i> Consejo Universitario </a></li>
                            <li><a <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listarector"; 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] >= $fecha){ ?>
                                style="font-size: 25px; background:rgb(255,255,255,.3); border-radius: 10px;"
                                    href="indexRector.php"<?php
                                }else{
                                    ?> href="indexRectorMensaje.php" 
                                    style="font-size: 25px; background:rgb(220,20,60,.3); border-radius: 10px;"
                                <?php } ?> ><i class="glyphicon glyphicon-hand-right"></i> Rector y Vicerrectores </a></li>
                            <li><a <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos WHERE Facultad = '".$_SESSION['Facultad']."' AND Sede = '".$_SESSION['Sede']."' AND IdTipoElecciones = '$tipoDecano'";//filtrar también por tipo 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] >= $fecha){ ?>
                                style="font-size: 25px; background:rgb(255,255,255,.3); border-radius: 10px;"
                                    href="ConsejoFacultad/indexConsejoDeFacultad.php"<?php
                                }else{
                                    ?> href="ConsejoFacultad/indexDecanoMensaje.php" 
                                    style="font-size: 25px; background:rgb(220,20,60,.3); border-radius: 10px;"
                                <?php } ?> ><i class="glyphicon glyphicon-hand-right"></i> Consejo de Facultad </a></li>
                                <?php  
                                if($_SESSION['rol'] == 'REM=;--;DC'){ ?>
                                    
                                    <li><a
                                    <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdTipoElecciones = '$tipoDirectoresAcademicos'"; 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] >= $fecha){ ?>
                                style="font-size: 25px; background:rgb(255,255,255,.3); border-radius: 10px;"
                                    href="DirectorDepartamentosAcademicos/indexDirectorDepartamento.php"<?php
                                }else{
                                    ?> href="DirectorDepartamentosAcademicos/indexDirectorDepartamentoMensaje.php"
                                    style="font-size: 25px; background:rgb(220,20,60,.3); border-radius: 10px;" 
                                <?php } ?> 
                                     
                                    ><i class="glyphicon glyphicon-hand-right"></i> Director de Departamentos Academicos </a></li><?php
                                }?>
                                <?php  
                                if($_SESSION['rol'] == 'RUc=;--;'){ ?>
                                    <li><a href="DirectorPosgrado/indexDirectorPosgrado.php" style="font-size: 25px;"><i class="glyphicon glyphicon-hand-right"></i> Director de Posgrado </a></li><?php
                                }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <img src="logo/blancotransparente.png" alt="" width="510" height="510" style="margin: auto auto auto 110px;">
        </div>
    </div>
    </div>
</body>

</html>