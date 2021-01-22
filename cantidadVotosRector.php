<?php 
    include ('db.php');
    if(isset($_GET['id'])){
        ob_start();
        $usuario = $_SESSION['usuario'];
        date_default_timezone_set('America/Lima');
        $fecha = date('Y/m/d');
        $queryListaElectores ="SELECT COUNT(*) FROM listaelectores WHERE IdUsuario = '$usuario' AND IdListaRector IN(SELECT IdLista FROM listarector WHERE PeriodoFin >= '".$fecha."')";
        $resultadoListaElectores = mysqli_query($conexion ,$queryListaElectores);
        $rowListaElectores = mysqli_fetch_row($resultadoListaElectores);
        if($rowListaElectores[0] == 0){
            $id = $_GET['id'];
            $queryP = "UPDATE listarector SET CantidadVotos = CantidadVotos+1  WHERE IdLista = '$id'";
            $resultadoP = mysqli_query($conexion, $queryP);
            if ($resultadoP) {
                echo '<h4>Gracias por votar</h4>';
                ob_start();
                if ($_SESSION['rol'] == 'QUw=;--;') {
                    $queryLista = "SELECT*FROM listarector WHERE IdLista = '$id'";
                    $resultadoLista = mysqli_query($conexion, $queryLista);
                    $rowLista = mysqli_fetch_row($resultadoLista);
                    $lista = $rowLista[0];
                    $partido = $rowLista[1];
                    date_default_timezone_set('America/Lima');
                    $fecha = date('Y/m/d');
                    $queryElectores = "INSERT INTO listaelectores(IdListaRector, IdUsuario, IdPartido, FechaSufragio) 
                VALUES('$lista', '$usuario', '$partido', '$fecha')";
                    $resultadoElectores = mysqli_query($conexion, $queryElectores);
                }if ($_SESSION['rol'] == 'REM=;--;DC') {
                    $queryLista = "SELECT*FROM listarector WHERE IdLista = '$id'";
                    $resultadoLista = mysqli_query($conexion, $queryLista);
                    $rowLista = mysqli_fetch_row($resultadoLista);
                    $lista = $rowLista[0];
                    $partido = $rowLista[1];
                    date_default_timezone_set('America/Lima');
                    $fecha = date('Y/m/d');
                    $queryElectores = "INSERT INTO listaelectores(IdListaRector, IdUsuario, IdPartido, FechaSufragio) 
                VALUES('$lista', '$usuario', '$partido', '$fecha')";
                    $resultadoElectores = mysqli_query($conexion, $queryElectores);
                }if ($_SESSION['rol'] == 'RUc=;--;') {
                    $queryLista = "SELECT*FROM listarector WHERE IdLista = '$id'";
                    $resultadoLista = mysqli_query($conexion, $queryLista);
                    $rowLista = mysqli_fetch_row($resultadoLista);
                    $lista = $rowLista[0];
                    $partido = $rowLista[1];
                    date_default_timezone_set('America/Lima');
                    $fecha = date('Y/m/d');
                    $queryElectores = "INSERT INTO listaelectores(IdListaRector, IdUsuario, IdPartido, FechaSufragio) 
                VALUES('$lista', '$usuario', '$partido', '$fecha')";
                    $resultadoElectores = mysqli_query($conexion, $queryElectores);
                }
            }
        }else{
            echo '<h4>Usted ya realizo la votación</h4>';
        }
    }else{
        echo $_GET['id'];
    }
?>