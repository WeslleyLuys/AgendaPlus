<?php

$query  = mysqli_query($conn, $select);

while($row = mysqli_fetch_array($query)){

$status          = $row['status'];
$id_cliente      = $row['id_cliente'];
$id_usuario      = $row['id_usuario'];
$id_procedimento = $row['id_procedimento'];
$hora            = $row['hora'];

$select_cliente = "SELECT `nome` FROM `cliente` WHERE `id` = '$id_cliente'";
$query_cliente  = mysqli_query($conn, $select_cliente);
$row_cliente    = mysqli_fetch_array($query_cliente);
$cliente        = $row_cliente['nome'];

$select_usuario = "SELECT `nome` FROM `usuario` WHERE `id` = '$id_usuario'";
$query_usuario  = mysqli_query($conn, $select_usuario);
$row_usuario    = mysqli_fetch_array($query_usuario);
$usuario        = $row_usuario['nome'];

$select_procedimento = "SELECT `nome` FROM `procedimento` WHERE `id` = '$id_procedimento'";
$query_procedimento  = mysqli_query($conn, $select_procedimento);
$row_procedimento    = mysqli_fetch_array($query_procedimento);
$procedimento        = $row_procedimento['nome'];

if($status == "Agendado"){
$icon = "<a class='btn btn-info btn-circle'><i class='fas fa-clock'></i></a>";
}

if($status == "Finalizado"){
$icon = "<a class='btn btn-success btn-circle'><i class='fas fa-check'></i></a>";
}

if($status == "Aviso"){
$icon = "<a class='btn btn-warning btn-circle'><i class='fas fa-exclamation-triangle'></i></a>";
}

if($status == "Cancelado"){
$icon = "<a class='btn btn-danger btn-circle'><i class='fas fa-times'></i></a>";
}

echo "

<div class='form-group row'>
    <div class='col-sm-6 mb-3 mb-sm-0'>
        <a href='#' class='btn btn-success btn-icon-split'>
            <span class='text'>$usuario</span>
        </a>
    </div>
    <div class='col-sm-6'>
        <a href='#' class='btn btn-ligth btn-icon-split'>
            <span class='text'>$hora</span>
        </a>
    </div>
</div>

<div class='form-group row'>
    <div class='col-sm-6 mb-3 mb-sm-0'>
        <a href='#' class='btn btn-primary btn-icon-split'>
            <span class='text'>$cliente</span>
        </a>
    </div>
    <div class='col-sm-6'>
        <a href='#' class='btn btn-ligth btn-icon-split'>
            <span class='text'>$procedimento</span>
        </a>
    </div>
</div>

<div class='form-group row'>
    <div class='col-sm-12 mb-3 mb-sm-0'>
        $icon
    </div>
</div>

<p><hr>

";

// echo " 
//     <a href='#' class='btn btn-success btn-icon-split'>
//     <span class='text'>$usuario</span>
//     </a>
//     <div class='margin-10px-top font-size14'>
//     <a href='#' class='btn btn-ligth btn-icon-split'>
//     <span class='text'>$hora</span>
//     </a>
//     </div>
//     <div class='font-size13 text-light-gray'>
//     <a href='#' class='btn btn-secondary btn-icon-split'>
//     <span class='text'>$cliente</span>
//     </a>
//     </div>
//     $icon
//     <p><hr>
// ";
}

?>