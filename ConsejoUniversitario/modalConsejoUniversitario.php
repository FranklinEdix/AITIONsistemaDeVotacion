
<?php 
    include ('db.php');
    if(isset($_GET['id'])){
        ob_start();
        $_SESSION['IdIntegranteLista']=$_GET['id'];
    include("tabla.php");
    }   
?>