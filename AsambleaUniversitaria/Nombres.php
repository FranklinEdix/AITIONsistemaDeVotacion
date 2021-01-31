<?php 
class Nombre
{
    public $conexion;
    public function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function NombreParticipante($id_user,$id_tipo)
    {
        if($id_tipo==1)
        {
           $Nombre=self::sql_names("docente","IdDocente",$id_user,$this->conexion);
           
        }elseif($id_tipo==2)
        {
            $Nombre=self::sql_names("estudiante","IdEstudiante",$id_user,$this->conexion);
            
        }else
        {
            $Nombre=self::sql_names("graduado","IdGraduado",$id_user,$this->conexion);
        }
        return $Nombre;
    }

    static function sql_names($nametable,$nameid,$id_user,$conexion)
    {
            $queryP = "SELECT * FROM $nametable WHERE $nameid = '$id_user'";
            $resultadoP = mysqli_query($conexion, $queryP);
            $rowP=mysqli_fetch_row($resultadoP);
            return $rowP[3];
    }
    function names($nametable,$nameid,$id_user)
    {
            $queryP = "SELECT * FROM $nametable WHERE $nameid = '$id_user'";
            $resultadoP = mysqli_query($this->conexion, $queryP);
            $rowP=mysqli_fetch_row($resultadoP);
            return $rowP[3];
    }

    function NombreFacultad($id_facultad)
    {
        $queryP = "SELECT * FROM facultad WHERE IdFacultad = '$id_facultad'";
        $resultadoP = mysqli_query($this->conexion, $queryP);
        $rowP=mysqli_fetch_row($resultadoP);
        return $rowP[2];
    }

    function NombreSede($id_sede)
    {
        $queryP = "SELECT * FROM sede WHERE IdSede = '$id_sede'";
        $resultadoP = mysqli_query($this->conexion, $queryP);
        $rowP=mysqli_fetch_row($resultadoP);
        return $rowP[1];
    }
    function NombreTipo($id_tipo)
    {
        if($id_tipo==1)
        {
            $Nombre="Docente";
        }elseif($id_tipo==2)
        {
            $Nombre="Estudiante";
            
        }else
        {
            $Nombre="Graduado";
        }
        return $Nombre;
    }
    

}

?>