<?php
class Consulta_Fecha{
        
    function ConsultaFecha()
    {   
        //session_start();
        $conexion = mysqli_connect("localhost","root","","aition");
        include("../Variables.php");
        include("../VariableGlobal.php");
        //----------------------------------------------------}
        $queryFecha = "SELECT MAX(PeriodoFin) AS 'Fecha' FROM listacandidatos WHERE IdTipoElecciones = '$tipoDirectorPostgrado'";//          
        //----------------------------------------------------
        //echo "<script> jajaja<script>";
       // $sql ="SELECT partido.NombrePartido, CantidadVotos FROM listacandidatos INNER JOIN partido ON listacandidatos.IdPartido = partido.IdPartido WHERE PeriodoFin= (SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdListaCandidato IN(SELECT IdListaCandidato FROM integrantelistacandidatos WHERE Facultad='".$_SESSION['Facultad']."' AND Sede='".$_SESSION['Sede']."' AND IdTipoElecciones='$tipoDecano')) AND Facultad='".$_SESSION['Facultad']."' AND Sede='".$_SESSION['Sede']."' AND IdTipoElecciones='$tipoDecano' ORDER BY CantidadVotos DESC";//listaRector
        //$sql ="SELECT partido.NombrePartido, CantidadVotos FROM listacandidatos INNER JOIN partido ON listacandidatos.IdPartido = partido.IdPartido WHERE PeriodoFin= (SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdListaCandidato IN(SELECT IdListaCandidato FROM integrantelistacandidatos WHERE Facultad='".$_SESSION['Facultad']."' AND Sede='".$SESSION['Sede']."' AND IdTipoElecciones='T003')) AND Facultad='F001' AND Sede='S001' AND IdTipoElecciones='T003' ORDER BY CantidadVotos DESC";//listaRector
        $resultadoFecha = mysqli_query($conexion ,$queryFecha); 
        if($resultadoFecha)
        {
            //session_start();
            $rowFecha = mysqli_fetch_row($resultadoFecha);
            ob_start();
            $_SESSION['PerioFinDecanoFacultad']=$rowFecha[0];

        }
        else
        {
            //session_start();
            ob_start();
            $_SESSION['PerioFinDecanoFacultad']=null;

        }
    }

}


?>