<?php include("db.php");?>
<!DOCTYPE html>
<html>

<head>
    <title>AITÍON</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">

    <link href="../css/stats.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>


<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <!-- Logo -->
                    <div class="logo">
                        <h1><a href="../home.php">AITÍON</a></h1>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--<div class="input-group form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="logo">
                        <h1><a href="indexLogin.html" class="logo">SALIR</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content" >
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar content-box" style="display:block;">
                    <ul class="nav">
                        <!-- Main menu -->
                        <li><a <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos"; 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] >= $fecha){ ?>
                                    href="indexConsejoUniversitario.php"<?php
                                }else{
                                    ?> href="indexConsejoUniversitarioMensaje.php" 
                                <?php } ?>><i class="glyphicon glyphicon-info-sign"></i>Información Candidatos</a></li>
                        <li class="current"><a <?php 
                            ob_start();
                            $usuario = $_SESSION['usuario'];
                            date_default_timezone_set('America/Lima');
                            $fecha = date('Y/m/d');
                            $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos"; 
                            $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                            $rowFecha = mysqli_fetch_row($resultadoFecha); 
                            $queryListaElectores ="SELECT COUNT(*) FROM listaelectores WHERE IdUsuario = '$usuario' AND IdListaRector IN(SELECT IdLista FROM listarector WHERE PeriodoFin >= '".$fecha."')";
                            $resultadoListaElectores = mysqli_query($conexion ,$queryListaElectores);
                            $rowListaElectores = mysqli_fetch_row($resultadoListaElectores);
                            if ($rowFecha[0] >= $fecha) {
                                if ($rowListaElectores[0] == 0) {
                                    ?>href="indexVotar.php"<?php
                                } else {
                                    ?>type="button" data-bs-toggle="modal" data-bs-target="#ModalVotar"<?php
                                }
                            }else{
                                ?> href="indexVotacionMensaje.php" <?php
                            }
                        ?>><i class="glyphicon glyphicon-ok"></i> Realizar Votación</a></li>
                        <!-- Modal -->
                        <div class="modal fade" id="ModalVotar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body1">
                                    <h3>Usted ya realizo la votación</h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        <li><a <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listarector"; //mala consulta
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] < $fecha){ ?>
                                    href="resultados.php"<?php
                                }else{
                                    ?> type="button" data-bs-toggle="modal" data-bs-target="#ModaResultado" 
                                <?php } ?>><i class="glyphicon glyphicon-signal"></i> Resultados</a></li>
                                <!-- Modal -->
                                <div class="modal fade" id="ModaResultado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Aún no termina el periodo de elecciones</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <!-------------->  
                                </ul>
                </div>
            </div>
            <div class="col-md-10">
                <center>    
                    <h1 style="color: #fff; margin: 200px 150px 100px 150px; padding: 50px; background: rgb(0, 0, 0, .7); border-radius: 10px;">La fecha de elecciones ya vencieron, espere la proxima apertura</h1>
                </center>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" ></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../vendors/morris/morris.css">


<script src="../vendors/jquery.knob.js"></script>
<script src="../vendors/raphael-min.js"></script>
<script src="../vendors/morris/morris.min.js"></script>

<script src="../vendors/flot/jquery.flot.js"></script>
<script src="../vendors/flot/jquery.flot.categories.js"></script>
<script src="../vendors/flot/jquery.flot.pie.js"></script>
<script src="../vendors/flot/jquery.flot.time.js"></script>
<script src="../vendors/flot/jquery.flot.stack.js"></script>
<script src="../vendors/flot/jquery.flot.resize.js"></script>

<script src="../js/custom.js"></script>
<script src="../js/stats.js"></script>
</body>

</html>