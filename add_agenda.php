<?php
include("config.php");
// error_reporting(0);
// ini_set(“display_errors”, 0 );

$cliente        = $_POST['cliente'];
$usuario        = $_POST['usuario'];
$data           = $_POST['data'];
$hora           = $_POST['hora'];
$procedimento   = $_POST['procedimento'];

mysqli_query($conn, "INSERT INTO `agenda`(`status`, `id_cliente`, `id_usuario`, `data`, `hora`, `procedimento`) VALUES('Agendado', '$cliente', '$usuario', '$data', '$hora', '$procedimento')");
mysqli_close($conn);
header('Location: agenda.php');
?>