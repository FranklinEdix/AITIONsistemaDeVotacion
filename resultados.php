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
    <link href="css/styles.css" rel="stylesheet">

    <link href="css/stats.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

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
                        <h1><a href="indexLogin.html" class="logo" style="color:azure;">SALIR</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar content-box" style="display: block;">
                    <ul class="nav">
                        <!-- Main menu --> 
                        <li><a href="indexRector.php"><i class="glyphicon glyphicon-info-sign"></i>Información Candidatos</a></li>
                        <li><a <?php
                                ob_start(); 
                                $usuario = $_SESSION['usuario']; 
                                $queryListaElectores = "SELECT COUNT(*) FROM listaelectores WHERE IdUsuario = '$usuario'"; 
                                $resultadoListaElectores = mysqli_query($conexion ,$queryListaElectores); 
                                $rowListaElectores = mysqli_fetch_row($resultadoListaElectores); 
                                if($rowListaElectores[0] == 0){ ?>
                                    href="indexVotar.php"<?php
                                }else{
                                    ?> type="button" data-bs-toggle="modal" data-bs-target="#ModalVotación" 
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
                        <li class="current"><a href="resultados.php"><i class="glyphicon glyphicon-signal"></i> Resultados</a></li>
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

                <!--<div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">Morris.js Stacked</div>

                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="hero-area" style="height: 230px;"></div>
                    </div>
                </div>

                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">Morris.js Monthly growth</div>

                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="hero-graph" style="height: 230px;"></div>
                    </div>
                </div>-->

                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">Resultados de la votación</div>

                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="hero-bar" style="height: 230px;"></div>
                            </div>
                            <div class="col-md-3">
                                <div id="hero-donut" style="height: 230px;"></div>
                            </div>
                            <div class="col-md-3">
                                <div id="hero-donut2" style="height: 230px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">jQuery Knob</div>

                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" value="50" class="knob second" data-thickness=".3" data-inputColor="#333" data-fgColor="#30a1ec" data-bgColor="#d4ecfd" data-width="150">
                            </div>
                            <div class="col-md-3">
                                <input type="text" value="75" class="knob second" data-thickness=".3" data-inputColor="#333" data-fgColor="#8ac368" data-bgColor="#c4e9aa" data-width="150">
                            </div>
                            <div class="col-md-3">
                                <input type="text" value="35" class="knob second" data-thickness=".3" data-inputColor="#333" data-fgColor="#5ba0a3" data-bgColor="#cef3f5" data-width="150">
                            </div>
                            <div class="col-md-3">
                                <input type="text" value="85" class="knob second" data-thickness=".3" data-inputColor="#333" data-fgColor="#b85e80" data-bgColor="#f8d2e0" data-width="150">
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="row">
                    <div class="col-md-6">
                        <div class="content-box-large">
                            <div class="panel-heading">
                                <div class="panel-title">Pie Chart</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                                    <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="piechart1" style="width:100%;height:200px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-box-large">
                            <div class="panel-heading">
                                <div class="panel-title">Pie Chart</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                                    <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="piechart2" style="width:100%;height:200px"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="content-box-large">
                            <div class="panel-heading">
                                <div class="panel-title">Bar Chart</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                                    <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="catchart" style="width:100%;height:300px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-box-large">
                            <div class="panel-heading">
                                <div class="panel-title">Multiple axes</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                                    <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="timechart" style="width:100%;height:300px"></div>
                            </div>
                        </div>
                    </div>-->
                </div>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="vendors/morris/morris.css">


    <script src="vendors/jquery.knob.js"></script>
    <script src="vendors/raphael-min.js"></script>
    <script src="vendors/morris/morris.min.js"></script>

    <script src="vendors/flot/jquery.flot.js"></script>
    <script src="vendors/flot/jquery.flot.categories.js"></script>
    <script src="vendors/flot/jquery.flot.pie.js"></script>
    <script src="vendors/flot/jquery.flot.time.js"></script>
    <script src="vendors/flot/jquery.flot.stack.js"></script>
    <script src="vendors/flot/jquery.flot.resize.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/stats.js"></script>
</body>

</html>