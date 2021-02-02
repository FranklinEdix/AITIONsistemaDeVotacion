<?php 
    include("db.php");
    include("../Variables.php");
    include("../VariableGlobal.php");
    require 'consultas.php';
    $M = new Consulta_Fecha();
    $M -> ConsultaFecha();
    date_default_timezone_set('America/Lima');
     $fecha = date('Y-m-d');
?>
<!DOCTYPE html>
<html>

<head>
    <title>AITÍON</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="../logo/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="../vendors/morris/morris.css">
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
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="logo">
                        <h1><a href="../indexLogin.html" class="logo" style="color:azure;">SALIR</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
    <center>
            <h1 style="color: white; background: rgb(0,0,0,.6); border-radius:15px; padding:10px; margin-top:10px;"><img src="../img/undac.png" alt="" width="80" height="80"> Asamblea Universitaria <img src="../img/undac.png" alt="" width="80" height="80"></h1>
        </center>
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar content-box" style="display: block;">
                    <ul class="nav">
                        <!-- Main menu --> 
                        <li><a <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdTipoElecciones = '$tipoAsamblea'";//filtrar también por tipo 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] >= $fecha){ ?>
                                    href="indexAsamblea.php"<?php
                                }else{
                                    ?> href="indexVotacionMensajeAsamblea.php" 
                                <?php } ?>><i class="glyphicon glyphicon-info-sign"></i>Información Candidatos</a></li>
                        <li><a <?php
                                $usuario = $_SESSION['usuario']; 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdTipoElecciones = '$tipoAsamblea'";//filtrar también por tipo 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha);
                                $queryListaElectores ="SELECT COUNT(*) FROM listaelectorestotales WHERE IdUsuario = '$usuario' AND IdListaCandidatos IN(SELECT IdListaCandidato FROM integrantelistacandidatos WHERE IdListaCandidato IN (SELECT IdListaCandidato FROM listacandidatos WHERE PeriodoFin >= '$fecha') AND IdTipoElecciones = '$tipoAsamblea')";
                                $resultadoListaElectores = mysqli_query($conexion ,$queryListaElectores);
                                $rowListaElectores = mysqli_fetch_row($resultadoListaElectores);
                                if ($rowFecha[0] > $fecha) {
                                        if ($rowListaElectores[0] == 0) { ?>
                                            href="indexVotarAsamblea.php"<?php
                                        } else {
                                        ?> type="button" data-bs-toggle="modal" data-bs-target="#ModalVotación" 
                                        <?php
                                        }
                                }else{
                                    ?> href="indexVotacionMensajeAsamblea.php" 
                                <?php } ?>><i class="glyphicon glyphicon-ok"></i> Realizar Votación</a></li>
                                <!-- Modal -->
                                        <div class="modal fade" id="ModalVotación" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Usted ya realizo la votación</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <!-------------->        
                        <li class="current"><a <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdTipoElecciones = '$tipoAsamblea'";//filtrar también por tipo 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] < $fecha){ ?>
                                    href="resultados.php"<?php
                                }else{
                                    ?> type="button" data-bs-toggle="modal" data-bs-target="#ModalResultado" 
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
                                                   </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card-body">
                    <div class="row" style="display: flex;">
                        <div class="col-lg-4">
                            <button style="margin-top: 5px;" class="btn btn-success" onclick="CargarDatosGraficoBar('myChart','bar','Listas')">Grafico Barra</button>
                        </div>
                        <div class="col-lg-4">
                            <button style="margin-top: 5px;" class="btn btn-success" onclick="CargarDatosGraficoBar('myChart3','doughnut','Listas')">Grafico Dona</button>
                        </div>
                        <div class="col-md-10">
                        <br>
                            <h2 id="ganador" style="Color: white; padding:10px; border-radius:15px;"></h2>
                        </div>
                        <div class="col-lg-6">
                        <canvas id="myChart"  width="505" height="505" style="margin-top: 20px;"></canvas>
                        <canvas id="myChart3" width="505" height="505" style="margin-top: 20px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<script>
        function CargarDatosGraficoBar(id,tipo,encabezado)
        {
            var titulo=[];
            var cantidad=[]; 
            $.ajax({
            url:'controlador_grafico.php',
            type:'POST'
            }).done(function(resp){
                if(resp.length>0)
                {
                    var info=JSON.parse(resp);
                    for(var i= 0;i<info.length;i++)
                    {
                        titulo.push(info[i][0]);
                        cantidad.push(info[i][1]);
                    }
                    //llamar función
                    if(info.length == 1){
                        <?php 

    include("../Variables.php");
    include("../VariableGlobal.php");
?>
                        document.getElementById("ganador").innerHTML="El ganador de la presente elección, es el partido: <strong>" + info[0][0] + "</strong>";
                    }else{
                        if(info[0][1] == info[1][1]){
                        document.getElementById("ganador").innerHTML="Hay empate de partidos espera segunda vuelta ";
                    
                        }else{
                            document.getElementById("ganador").innerHTML="El ganador de la presente elección, es el partido: <strong>" + info[0][0] + "</strong>";
                        }
                    }
                    if(id=="myChart3")
                    {
                        crear_dona_grafico(id,tipo,encabezado,titulo,cantidad);
                        document.getElementById(id).style.display = "block";
                        document.getElementById("myChart").style.display = "none";
                    }
                    else
                    {
                        crear_grafico(id,tipo,encabezado,titulo,cantidad);
                        document.getElementById(id).style.display = "block";
                        document.getElementById("myChart3").style.display = "none";
                    }

                //
                }
            }); 
            
        }
        function crear_grafico(id,tipo,encabezado,titulo,cantidad)
        {
            var ctx = document.getElementById(id);
            document.getElementById(id).style.backgroundColor = "rgb(255,255,255,.6)";
            document.getElementById("ganador").style.backgroundColor = "rgb(0,0,0,.6)";
            var myChart = new Chart(ctx, {
            type: tipo,
            data: {
                labels: titulo,
                datasets: [{
                    label: encabezado,
                    data: cantidad,
                    backgroundColor: color(cantidad.length,1),
                    borderColor: color(cantidad.length,1),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        }

      function crear_dona_grafico(id,tipo,encabezado,titulo,cantidad)
        {   
            document.getElementById(id).style.backgroundColor = "rgb(255,255,255,.6)";
            var data = {
                        labels: titulo,
                        datasets: [
                            {
                                data: cantidad,
                                backgroundColor: color(cantidad.length,1),
                                
                            }]
                    };
 
            var ctx = document.getElementById(id);
            var myChart = new Chart(ctx, {
            type: tipo,
            data: data,
           
            options: {   
                
            }
        });
        }
        //-------------------------------------------------------------------------------------
        function color(cant,difusion)
        {
            var exa=[];
            var R=3;
            var G=0;
            var B=1;
            var auxR=Math.trunc(236/cant);
            var auxB=Math.trunc(49/cant);
            for(var i=0;i<cant;i++)
            {   exa.push('rgba('+R+','+G+','+B+','+difusion+')');
                var R=R+auxR;
                var B=B+auxB;
                
            }
            return exa;
        }

    </script>