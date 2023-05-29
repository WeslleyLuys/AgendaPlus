<?php
session_start();
include("config.php");
// error_reporting(0);
// ini_set(“display_errors”, 0 );

$email       = $_POST['email'];
$senha       = $_POST['senha'];

$select      = "SELECT `id`, `nome`, `especialidade`, `email`, `senha` FROM `usuario` WHERE `email` = '$email' AND `senha` = '$senha'";
$query       = mysqli_query($conn, $select);
$result      = mysqli_num_rows($query);
$row         = mysqli_fetch_array($query);

if($result == 1){
    $_SESSION['id']             = $row['id'];
    $_SESSION['nome']           = $row['nome'];
    $_SESSION['especialidade']  = $row['especialidade'];
    $_SESSION['email']          = $row['email'];
    $_SESSION['senha']          = $row['senha'];

    header('Location: clin.php');
} else {
    header('Location: index.html');
}

?>