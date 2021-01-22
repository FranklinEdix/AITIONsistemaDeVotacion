<?php 
    include('db.php');
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['clave'];
    $rol = $_POST['rid'];

    if($rol == 'QUw=;--;'){
        $query = "SELECT*FROM estudiante WHERE IdEstudiante = '$usuario' AND Contraseña = '$contraseña'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_array($result);
        if($row){
            ob_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $rol;
            header("Location: alumno.php");
        }else{?>
        <?php
            ?>
            <script>
                alert("Datos Incorrectos");
            </script>
        <?php
        include('indexLogin.html');
        }
        
    }elseif($rol == 'REM=;--;DC'){
        $query = "SELECT*FROM docente WHERE IdDocente = '$usuario' AND Contraseña = '$contraseña'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_array($result);
        if($row){
            ob_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $rol;
            header("Location: alumno.php");
        }else{?>
            <?php
                ?>
                <script>
                    alert("Datos Incorrectos");
                </script>
            <?php
            include('indexLogin.html');
            }
    }elseif($rol == 'RUc=;--;'){
        $query = "SELECT*FROM graduado WHERE IdGraduado = '$usuario' AND Contraseña = '$contraseña'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_array($result);
        if($row){
            ob_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $rol;
            header("Location: alumno.php");
        }else{?>
            <?php
                ?>
                <script>
                    alert("Datos Incorrectos");
                </script>
            <?php
            include('indexLogin.html');
            }
    }elseif($rol == 'Nulo'){
        header("Location: indexLogin.html");
    }else{
        header("Location: alumno_1.php");
    }  
?>