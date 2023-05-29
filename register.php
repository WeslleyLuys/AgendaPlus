<?php
include("config.php");
// error_reporting(0);
// ini_set(“display_errors”, 0 );

$nome                = $_POST['nome'];
$especialidade       = $_POST['especialidade'];
$cor                 = $_POST['cor'];
$email               = $_POST['email'];
$senha               = $_POST['senha'];

mysqli_query($conn, "INSERT INTO `usuario`(`nome`, `especialidade`, `cor`, `email`, `senha`) VALUES('$nome', '$especialidade', '$cor', '$email', '$senha')");
mysqli_close($conn);
header('Location: index.html');
?>