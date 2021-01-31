<?php 
    include ('db.php');
    if(isset($_GET['id'])){
        include("../Variables.php");
        include("../VariableGlobal.php");
        $usuario = $_SESSION['usuario'];
        date_default_timezone_set('America/Lima');
        $fecha = date('Y/m/d');
        $queryListaElectores ="SELECT COUNT(*) FROM listaelectorestotales WHERE IdUsuario = '$usuario' AND IdListaCandidatos IN(SELECT IdListaCandidato FROM integrantelistacandidatos WHERE IdListaCandidato IN (SELECT IdListaCandidato FROM listacandidatos WHERE PeriodoFin >= '$fecha') AND IdTipoElecciones = '$tipoConsejoUniversitario')";
        $resultadoListaElectores = mysqli_query($conexion ,$queryListaElectores);
        $rowListaElectores = mysqli_fetch_row($resultadoListaElectores);
        if($rowListaElectores[0] == 0){
            $id = $_GET['id'];
            $valorVotos = 1;
            $queryP = "UPDATE listacandidatos SET CantidadVotos = CantidadVotos + '$valorVotos'  WHERE IdListaCandidato = '$id'";
            $resultadoP = mysqli_query($conexion, $queryP);
            if ($resultadoP) {
                echo '<h4>Gracias por votar</h4>';
                ob_start();
                //Estudiante          
                    $queryLista = "SELECT*FROM listacandidatos WHERE IdListaCandidato = '$id'";
                    $resultadoLista = mysqli_query($conexion, $queryLista);
                    $rowLista = mysqli_fetch_row($resultadoLista);
                    $lista = $rowLista[0];
                    $partido = $rowLista[1];
                    date_default_timezone_set('America/Lima');
                    $fecha = date('Y/m/d');
                    $queryElectores = "INSERT INTO listaelectorestotales(IdListaCandidatos, IdUsuario, IdPartido, IdTipoElecciones, FechaSufragio) 
                    VALUES('$lista', '$usuario', '$partido', '$tipoConsejoUniversitario','$fecha')";
                    $resultadoElectores = mysqli_query($conexion, $queryElectores);  
            }
        }else{
            echo '<h4>Usted ya realizo la votación</h4>';
        }
    }else{
        echo $_GET['id'];
    }
?>