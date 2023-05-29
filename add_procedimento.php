<?php
include("config.php");
// error_reporting(0);
// ini_set(“display_errors”, 0 );

$nome           = $_POST['nome'];
$duracao        = $_POST['duracao'];
$complexidade   = $_POST['complexidade'];
$valor          = $_POST['valor'];

mysqli_query($conn, "INSERT INTO `procedimento`(`nome`, `duracao`, `complexidade`, `valor`) VALUES('$nome', '$duracao', '$complexidade', '$valor')");
mysqli_close($conn);
header('Location: procedimento.php');
?>