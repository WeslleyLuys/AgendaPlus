<?php
include("config.php");
// error_reporting(0);
// ini_set(“display_errors”, 0 );

$nome       = $_POST['nome'];
$cpf        = $_POST['cpf'];
$data       = $_POST['data'];
$email      = $_POST['email'];
$celular    = $_POST['celular'];
$status     = $_POST['status'];

mysqli_query($conn, "INSERT INTO `cliente`(`nome`, `data_nasc`, `status`, `cpf`, `celular`, `email`) VALUES('$nome', '$data', '$status', '$cpf', '$celular', '$email')");
mysqli_close($conn);
header('Location: cliente.php');
?>