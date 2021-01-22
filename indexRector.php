<?php include("db.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>AITÍON</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

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
                <div class="col-md-5">
                    <!-- Logo -->
                    <div class="logo">
                        <h1><a href="home.html">AITÍON</a></h1>
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
                        <li class="current"><a href="indexRector.php"><i class="glyphicon glyphicon-info-sign"></i>Información Candidatos</a></li>
                        <li><a <?php 
                            ob_start();
                            $usuario = $_SESSION['usuario'];
                            date_default_timezone_set('America/Lima');
                            $fecha = date('Y/m/d');
                            $queryListaElectores ="SELECT COUNT(*) FROM listaelectores WHERE IdUsuario = '$usuario' AND IdListaRector IN(SELECT IdLista FROM listarector WHERE PeriodoFin >= '".$fecha."')";
                            $resultadoListaElectores = mysqli_query($conexion ,$queryListaElectores);
                            $rowListaElectores = mysqli_fetch_row($resultadoListaElectores);
                            if($rowListaElectores[0] == 0){
                                ?>href="indexVotar.php"<?php
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
                        <li><a href="resultados.php"><i class="glyphicon glyphicon-signal"></i> Resultados</a></li>
                        <!--<li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                        <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
                        <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
                        <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> Pages
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu 
                            <ul>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="signup.html">Signup</a></li>
                            </ul>
                        </li>-->
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                <?php
                    date_default_timezone_set('America/Lima'); 
                    $FechaHoy = date('Y/m/d');
                    $query = "SELECT*FROM integrantelistarector WHERE IdLista IN (SELECT IdLista FROM listarector WHERE PeriodoFin >= '".$FechaHoy."')";
                    $resultado = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_row($resultado)){?>
                    <div class="col-md-4">
                        <div class="content-box-large">
                            <center>
                                <?php 
                                    $queryPartido = "SELECT*FROM partido WHERE IdPartido = '$row[2]'";
                                    $resultadoPartido = mysqli_query($conexion, $queryPartido);
                                    $rowPartido = mysqli_fetch_row($resultadoPartido);    
                                    echo '<img src="data:image/png;base64,'.base64_encode($rowPartido[2]).'" style="width:200px;height:200px;">';?>
                            </center>
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <center>
                                        <h3><strong><?php 
                                        $queryPartido = "SELECT*FROM partido WHERE IdPartido = '$row[2]'";
                                        $resultadoPartido = mysqli_query($conexion, $queryPartido);
                                        $rowPartido = mysqli_fetch_row($resultadoPartido);
                                        echo $rowPartido[1];?></strong></h3>
                                    </center>
                                    <h4><strong>Nombre:</strong> <?php                                         
                                        $queryDocente = "SELECT*FROM docente WHERE IdDocente = '$row[0]'";
                                        $resultadoDocente = mysqli_query($conexion, $queryDocente);
                                        $rowDocente = mysqli_fetch_row($resultadoDocente);
                                        echo $rowDocente[3];?></h4><br>
                                    <h4><strong>Cargo:</strong> <?php 
                                    if($row[4]==1){
                                        echo "Rector";
                                    }elseif($row[4]==2){
                                        echo "Vicerrector Academico";
                                    }else{
                                        echo "Vicerrector de Investigación";    
                                    }
                                    ?></h4><br>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!--Describción del candidato y/o partido-->
                            </div>
                            <center>
                                <div class="panel-options">
                                <br> 
                                    
                                        <a href="" type="button" class="btn btn-primary openBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Descripcion(this)" id="<?php echo $row[3];?>">Más Información</a>
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
                                $('.modal-body').load('modalRector.php?id='+codigo,function(){
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
                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="https://code.jquery.com/jquery.js"></script>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="bootstrap/js/bootstrap.min.js"></script>
                    <script src="js/custom.js"></script>
            
</body>
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>

</html>