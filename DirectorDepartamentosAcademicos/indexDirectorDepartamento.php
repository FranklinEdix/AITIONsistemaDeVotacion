<?php 
include("db.php");
include("../Variables.php");
include("../Variables.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>AITÍON</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

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
                <div class="col-md-4">
                    <!-- Logo -->
                    <div class="logo">
                        <h1><a href="../home.php">AITÍON</a></h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="logo">
                        
                            
                            <!--<div class="input-group form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
                            </div>-->
                        
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="logo">
                        <h1><a href="../indexLogin.html">SALIR</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-content" >
        <center>
            <h1 style="color: white; background: rgb(0,0,0,.6); border-radius:15px; padding:10px; margin-top:10px;"><img src="../img/undac.png" alt="" width="80" height="80"> Director de Departamentos academicos <img src="../img/undac.png" alt="" width="80" height="80"></h1>
        </center>
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar content-box" style="display:block;">
                    <ul class="nav">
                        <!-- Main menu -->
                        <li class="current"><a <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdTipoElecciones = '$tipoDirectoresAcademicos'";// 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] >= $fecha){?>
                                    
                                    href="indexDirectorDepartamento.php"<?php
                                }else{
                                    ?> href="indexDirectorDepartamentoMensaje.php" 
                                <?php } ?>><i class="glyphicon glyphicon-info-sign"></i>Información Candidatos</a></li>
                        <li><a <?php 
                            
                            include("../Variables.php");
                            include("../VariableGlobal.php");
                            $usuario = $_SESSION['usuario'];
                            date_default_timezone_set('America/Lima');
                            $fecha = date('Y/m/d');
                            $queryListaElectores ="SELECT COUNT(*) FROM listaelectorestotales WHERE IdUsuario = '$usuario' AND IdListaCandidatos IN(SELECT IdListaCandidato FROM integrantelistacandidatos WHERE IdListaCandidato IN (SELECT IdListaCandidato FROM listacandidatos WHERE PeriodoFin >= '$fecha') AND IdTipoElecciones = '$tipoDirectoresAcademicos')";
                            $resultadoListaElectores = mysqli_query($conexion ,$queryListaElectores);
                            $rowListaElectores = mysqli_fetch_row($resultadoListaElectores);
                            if($rowListaElectores[0] == 0){
                                ?>href="indexVotarDirectorDepartamento.php"<?php
                            }else{
                                ?>type="button" data-bs-toggle="modal" data-bs-target="#ModalVotar"<?php
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
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdTipoElecciones='$tipoDirectoresAcademicos'"; 
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
                                                    <div class="modal-body-2">
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
            
            <div class="col-md-6">
                <div class="row">
                <?php
                    date_default_timezone_set('America/Lima'); 
                    $FechaHoy = date('Y/m/d');
                    include("../Variables.php");
                    $query = "SELECT*FROM integrantelistacandidatos WHERE IdListaCandidato IN (SELECT IdListaCandidato FROM listacandidatos WHERE PeriodoFin >= '".$FechaHoy."') AND IdTipoElecciones = '$tipoDirectoresAcademicos'";
                    $resultado = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_row($resultado)){?>
                    <div class="col-md-6">
                        <div class="content-box-large">
                            <center>
                                <?php 
                                    $queryPartido = "SELECT*FROM partido WHERE IdPartido = '$row[3]'";
                                    $resultadoPartido = mysqli_query($conexion, $queryPartido);
                                    $rowPartido = mysqli_fetch_row($resultadoPartido);    
                                    echo '<img src="data:image/png;base64,'.base64_encode($rowPartido[2]).'" style="width:200px;height:200px;">';?>
                            </center>
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <center>
                                        <h3><strong><?php 
                                        $queryPartido = "SELECT*FROM partido WHERE IdPartido = '$row[3]'";
                                        $resultadoPartido = mysqli_query($conexion, $queryPartido);
                                        $rowPartido = mysqli_fetch_row($resultadoPartido);
                                        echo $rowPartido[1];?></strong></h3>
                                    </center>
                                    <h4><strong>Nombre:</strong> <?php                                         
                                        $queryDocente = "SELECT*FROM docente WHERE IdDocente = '$row[1]'";
                                        $resultadoDocente = mysqli_query($conexion, $queryDocente);
                                        $rowDocente = mysqli_fetch_row($resultadoDocente);
                                        echo $rowDocente[3];?></h4><br>
                                    <h4><strong>Cargo: </strong>Director Departamento Academico</h4><br>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!--Describción del candidato y/o partido-->
                            </div>
                            <center>
                                <div class="panel-options">
                                <br> 
                                    
                                        <a href="" type="button" class="btn btn-primary openBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Descripcion(this)" id="<?php echo $row[0];?>">Más Información</a>
                                        <br><br>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Descripción</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <script>  
                                function Descripcion(elemento){
                                var codigo = elemento.id;
                                $('.modal-body').load('modalDirectorDepartamento.php?id='+codigo,function(){
                                    $('#exampleModal').modal({show:true});
                                });
                            }
                            </script>
                        </div>
                    </div>
                    <?php }?>
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
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="../bootstrap/js/bootstrap.min.js"></script>
                    <script src="../js/custom.js"></script>
            
</body>
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/custom.js"></script>
</body>

</html>