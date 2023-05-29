<!DOCTYPE html>
<html lang="en">

<head>

    <?php 
        session_start(); 
        include("config.php");
    ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AGENDA PLUS</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("menu.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("nav.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <?php
                            date_default_timezone_set('America/Sao_Paulo');
                            $data_atual = date("Y-m-d"); 
                            $dia        = date("d");
                            $Sem        = date("D");
                            $Month      = date("M");

                            if($Sem == 'Mon'){ $semana = 'Segunda-Feira'; }
                            if($Sem == 'Tue'){ $semana = 'Terça-Feira'; }
                            if($Sem == 'Wed'){ $semana = 'Quarta-Feira'; }
                            if($Sem == 'Thu'){ $semana = 'Quinta-Feira'; }
                            if($Sem == 'Fri'){ $semana = 'Sexta-Feira'; }
                            if($Sem == 'Sat'){ $semana = 'Sabádo'; }
                            if($Sem == 'Sun'){ $semana = 'Domingo'; }

                            if($Month == 'January'){ $mes = 'Janeiro'; }
                            if($Month == 'February'){ $mes = 'Fevereiro'; }
                            if($Month == 'March'){ $mes = 'Março'; }
                            if($Month == 'April '){ $mes = 'Abril'; }
                            if($Month == 'May'){ $mes = 'Maio'; }
                            if($Month == 'June'){ $mes = 'Junho'; }
                            if($Month == 'July'){ $mes = 'Julho'; }
                            if($Month == 'August'){ $mes = 'Agosto'; }
                            if($Month == 'September'){ $mes = 'Setembro'; }
                            if($Month == 'October'){ $mes = 'Outubro'; }
                            if($Month == 'November'){ $mes = 'Novembro'; }
                            if($Month == 'December'){ $mes = 'Dezembro'; }
                            
                        ?>
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $semana; echo ", "; echo $dia; echo " de "; echo $mes; ?></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Cards -->
                        <?php

                            $select = "SELECT `id`, `nome`, `especialidade`, `cor`, `email`, `senha` FROM `usuario`";
                            $query  = mysqli_query($conn, $select);

                            while($row = mysqli_fetch_array($query)){
                            
                                $id     = $row['id'];
                                $nome   = $row['nome'];
                                $cor    = $row['cor'];

                                $select_clientes = "SELECT COUNT(*) as clientes FROM `agenda` WHERE `id_usuario` = '$id' AND `data` = '$data_atual'";
                                $query_clientes  = mysqli_query($conn, $select_clientes);
                                $row_clientes    = mysqli_fetch_array($query_clientes);
                                $total_clientes  = $row_clientes['clientes'];

                                echo "<div class='col-xl-12 col-md-6 mb-4'>
                                            <div class='card border-left-success shadow h-100 py-2'>
                                                <div class='card-body'>
                                                    <div class='row no-gutters align-items-center'>
                                                        <div class='col mr-2'>
                                                            <div class='text-xs font-weight-bold text-primary text-uppercase mb-1'>
                                                            $nome ( $id )</div>
                                                            <div class='h5 mb-0 font-weight-bold text-gray-800'>$total_clientes PACIENTES</div>
                                                        </div>
                                                        <div class='col-auto'>
                                                            <i class='fas fa-clipboard-list fa-2x text-gray-300'></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                            }

                        ?>
                    <!-- Cards -->


                    <!-- Content Row -->
                    <!-- <div class="row"> -->

                        <!-- Content Column -->
                        <div class="col-sm-12">
                            <div class="container">
                                <div class="timetable-img text-center">
                                    <img src="img/content/timetable.png" alt="">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="bg-light-gray">
                                                <th class="text-uppercase">HORARIO</th>
                                                <th class="text-uppercase">AGENDAMENTO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">07:00</td>
                                                <td align="center">

                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%07%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>
                
                                            <tr>
                                                <td class="align-middle">08:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%08%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>
                
                                            <tr>
                                                <td class="align-middle">09:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%09%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>
                
                                            <tr>
                                                <td class="align-middle">10:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%10%'";
                                                        include("banco.php");
                                                    ?>                
                                                </td>
                                            </tr>
                
                                            <tr>
                                                <td class="align-middle">11:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%11%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">12:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%12%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">13:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%13%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">14:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%14%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">15:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%15%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">16:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%16%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">17:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%17%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">18:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%18%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">19:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%19%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">20:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%20%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">21:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%21%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">22:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%22%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="align-middle">23:00</td>
                                                <td align="center">
                                                    <?php
                                                        $select = "SELECT `status`, `id_cliente`, `id_usuario`, `id_procedimento`, `data`, `hora` FROM `agenda` WHERE `hora` LIKE '%23%'";
                                                        include("banco.php");
                                                    ?>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">QUER REALMENTE SAIU?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">CANCELAR</button>
                    <a class="btn btn-primary" href="logout.php">SAIR</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>