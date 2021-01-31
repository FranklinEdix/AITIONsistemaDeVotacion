<?php
class Modelo_Grafico{
    private $conexion;
    function __construct()
    {
        require_once('conexion.php');
        $this->conexion = new  conexion();
        $this->conexion->conectar();
    }
    
    function TraerDatosGraficoBar()
    {   
        session_start();
        include("../Variables.php");
        include("../VariableGlobal.php");
        //echo "<script> jajaja<script>";
        $sql ="SELECT partido.NombrePartido, CantidadVotos FROM listacandidatos INNER JOIN partido ON listacandidatos.IdPartido = partido.IdPartido WHERE PeriodoFin= (SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdListaCandidato IN(SELECT IdListaCandidato FROM integrantelistacandidatos WHERE IdTipoElecciones='$tipoDirectorPostgrado')) AND IdTipoElecciones='$tipoDirectorPostgrado' ORDER BY CantidadVotos DESC";//listaRector
        //$sql ="SELECT partido.NombrePartido, CantidadVotos FROM listacandidatos INNER JOIN partido ON listacandidatos.IdPartido = partido.IdPartido WHERE PeriodoFin= (SELECT MAX(PeriodoFin) FROM listacandidatos WHERE IdListaCandidato IN(SELECT IdListaCandidato FROM integrantelistacandidatos WHERE Facultad='".$_SESSION['Facultad']."' AND Sede='".$SESSION['Sede']."' AND IdTipoElecciones='T003')) AND Facultad='F001' AND Sede='S001' AND IdTipoElecciones='T003' ORDER BY CantidadVotos DESC";//listaRector
        $arreglo=array();
        if($consulta=$this->conexion->conexion->query($sql))
        {
            while($consulta_VU = mysqli_fetch_array($consulta))
            {
                $arreglo[]=$consulta_VU;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    }

}


?>