<?php 
    include("db.php");
    include("../Variables.php");
    include("../Variables.php");
    require 'consultas.php';
    $M = new Consulta_Fecha();
    $M -> ConsultaFecha();
    date_default_timezone_set('America/Lima');
     $fecha = date('Y-m-d');
     include("../header.php");
?>
    <div class="page-content" >
    <center>
            <h1 style="color: white; background: rgb(0,0,0,.6); border-radius:15px; padding:10px; margin-top:10px;"><img src="../img/undac_white.png" alt="" width="80" height="80"> Asamblea Universitaria <img src="../img/undac_white.png" alt="" width="80" height="80"></h1>
        </center>
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar content-box" style="display:block;">
                    <ul class="nav">
                        <!-- Main menu -->
                        <li><a <?php 
                                date_default_timezone_set('America/Lima');
                                $fecha = date('Y-m-d');
                                $queryFecha = "SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdTipoElecciones = '$tipoAsamblea'";// 
                                $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
                                $rowFecha = mysqli_fetch_row($resultadoFecha); 
                                if($rowFecha[0] >= $fecha){ ?>
                                    href="indexAsamblea.php"<?php
                                }else{
                                    ?> href="indexAsambleaMensaje.php" 
                                <?php } ?>><i class="glyphicon glyphicon-info-sign"></i>Información Candidatos</a></li>
                        <li class="current"><a href="indexVotarAsamblea.php"><i class="glyphicon glyphicon-ok"></i> Realizar Votación</a></li>
                        <li><a <?php 

                                ob_start();                                
                                if($_SESSION['PerioFinDecanoFacultad'] < $fecha){ ?>
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
                                
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                <?php
                    date_default_timezone_set('America/Lima'); 
                    $FechaHoy = date('Y/m/d');
                    include("../Variables.php");
                    include("../VariableGlobal.php");
                    $query = "SELECT*FROM listacandidatos WHERE IdListaCandidato IN (SELECT IdListaCandidato FROM listacandidatos WHERE PeriodoFin >= '".$FechaHoy."') AND IdTipoElecciones = '$tipoAsamblea'";
                    $resultado = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_row($resultado)){ ?>
                    <div class="col-md-6">
                        <div class="content-box-large">
                            <center>
                                <?php 
                                    $queryPartido = "SELECT*FROM partido WHERE IdPartido = '$row[1]'";
                                    $resultadoPartido = mysqli_query($conexion, $queryPartido);
                                    $rowPartido = mysqli_fetch_row($resultadoPartido);    
                                    echo '<img src="data:image/png;base64,'.base64_encode($rowPartido[2]).'" style="width:200px;height:200px;">';?>
                            </center>
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <center>
                                        <h3><strong><?php 
                                        $queryPartido = "SELECT*FROM partido WHERE IdPartido = '$row[1]'";
                                        $resultadoPartido = mysqli_query($conexion, $queryPartido);
                                        $rowPartido = mysqli_fetch_row($resultadoPartido);
                                        echo $rowPartido[1];?></strong></h3>
                                    </center>
                                     <h4><strong>Cargo: </strong>Asamblea Universitaria</h4><br>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!--Describción del candidato y/o partido-->
                            </div>
                            <center>
                                <div class="panel-options">
                                <br> 
                                    
                                        <a href="" type="button" class="btn btn-primary openBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Descripcion(this)" id="<?php echo $row[0];?>">►Elegir</a>
                                        <br><br>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="background: #91DC9C;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
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
                                $('.modal-body').load('cantidadVotosAsamblea.php?id='+codigo,function(){
                                    $('#exampleModal').modal({show:true});
                                });
                            }
                            </script>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
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