
                        <?php 
                        include ('db.php');
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $queryP = "SELECT*FROM integrantelistacandidatos WHERE IdIntegranteListaCandidatos = '$id'";
                            $resultadoP = mysqli_query($conexion, $queryP);
                            $rowP = mysqli_fetch_row($resultadoP);
                            echo '<h4>'.$rowP[7].'</h4>';

                        }else{
                            echo $_GET['id'];
                        }
                        ?>