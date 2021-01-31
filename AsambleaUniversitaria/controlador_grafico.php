<?php
require 'modelo.php';
$M = new Modelo_Grafico();
$consulta = $M -> TraerDatosGraficoBar();
echo json_encode($consulta);
?>