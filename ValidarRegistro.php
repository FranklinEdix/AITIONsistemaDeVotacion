<?php 
    include('db.php');
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['clave'];
    $rol = $_POST['rid'];
    if($rol == 'QUw=;--;'){
        verificate_exits("estudiante",$usuario,$contraseña,"alumno.php",$rol,$conexion,"IdEstudiante","pass");       
    }elseif($rol == 'REM=;--;DC'){
        verificate_exits("docente",$usuario,$contraseña,"alumno.php",$rol,$conexion,"IdDocente","pass");
    }elseif($rol == 'RUc=;--;'){
        verificate_exits("graduado",$usuario,$contraseña,"alumno.php",$rol,$conexion,"IdGraduado","pass");
    }elseif($rol == 'Nulo'){
        header("Location: indexLogin.html");
    }else{
        header("Location: alumno_1.php");
    }

    

    ?> 
    <?php
    
    function verificate_exits($tabla,$usuario,$contraseña,$header,$rol,$conexion,$nameid,$namepass)
    {
        $query = "SELECT*FROM $tabla WHERE $nameid = '$usuario' AND $namepass = '$contraseña'";
            $result = mysqli_query($conexion, $query);
            if($result){
                $row = mysqli_fetch_array($result);
            }
            else
            {
                $row=null;
            }
                   
        if(!is_null($row)){
            ob_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $rol;
            $_SESSION['Facultad'] = $row[1];
            $_SESSION['Sede'] = $row[2];
            header("Location:".$header);
        }
        else
        {
            ?>
        <?php
            ?>
            <script>
                alert("Datos Incorrectos");
            </script>
        <?php
        include("indexLogin.html");
        }
    }
?> 