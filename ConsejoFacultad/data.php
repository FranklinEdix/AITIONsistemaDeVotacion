<?php
header('Content-Type: application/json');
$data = array(array("student_name",22),array("marks",12));
echo json_encode($data);
echo "<script>alert('Hola');</script>";
?>