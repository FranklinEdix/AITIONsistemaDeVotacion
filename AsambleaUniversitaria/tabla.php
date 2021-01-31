<?php
  $conexion = mysqli_connect("localhost","root","","aition");
  require 'Nombres.php';
  $N = new Nombre($conexion);
  //$consulta = $N -> prueva();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Participante</th>
      <th scope="col">Facultad</th>
      <th scope="col">Sede</th>
      <th scope="col">Tipo</th>
      <th scope="col">Descripción</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      ob_start();
      $queryP = "SELECT * FROM integrantelistacandidatos WHERE IdListaCandidato = '".$_SESSION['IdIntegranteLista']."'";
      $resultadoP = mysqli_query($conexion, $queryP);
      $i=1;
      while($rowP=mysqli_fetch_row($resultadoP)){?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $N->NombreParticipante($rowP[1],$rowP[8]); ?></td>
      <td><?php echo $N->NombreFacultad($rowP[5]); ?></td>
      <td><?php echo $N->NombreSede($rowP[6]); ?></td>
      <td><?php echo $N->NombreTipo($rowP[8]); ?></td>
      <td><?php echo $rowP[7]; ?></td>
    </tr>
    <?php 

      }
    ?>
  </tbody>
</table>
</body>
</html>