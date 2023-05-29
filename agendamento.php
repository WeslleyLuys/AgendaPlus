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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">AGENDA</h1>

                    <form method="POST" action="add_agenda.php">

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>CLIENTES:</label>
                                <select name="cliente" class="form-control select2">
                                    <?php
                                      $select1 = "SELECT `id`, `nome` FROM `cliente`";
                                      $query1  = mysqli_query($conn, $select1);

                                      while($row1 = mysqli_fetch_array($query1)){
                                        $id_cliente   = $row1['id'];
                                        $nome_cliente = $row1['nome'];
                                        echo "<option value='$id_cliente'>$nome_cliente</option>";
                                      }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>ESPECIALISTA:</label>
                                <select name="usuario" placeholder="usuario" class="form-control select2">
                                    <?php
                                      $select2 = "SELECT `id`, `nome` FROM `usuario`";
                                      $query2  = mysqli_query($conn, $select2);

                                      while($row2 = mysqli_fetch_array($query2)){
                                        $id_usuario   = $row2['id'];
                                        $nome_usuario = $row2['nome'];
                                        echo "<option value='$id_usuario'>$nome_usuario</option>";
                                      }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>HORARIO:</label>
                                <input type="time" name="hora" class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label>DATA:</label>
                                <input type="date" name="data" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label>PROCEDIMENTO:</label>
                                <select name="procedimento" class="form-control select2">
                                    <?php
                                      $select3 = "SELECT `id`, `nome` FROM `procedimento`";
                                      $query3  = mysqli_query($conn, $select3);

                                      while($row3 = mysqli_fetch_array($query3)){
                                        $id_procedimento   = $row3['id'];
                                        $nome_procedimento = $row3['nome'];
                                        echo "<option value='$id_procedimento'>$nome_procedimento</option>";
                                      }
                                    ?>
                                </select>
                            </div>
                        </div>



                        <input type="submit" name="incluir" value="AGENDAR" class="btn btn-primary btn-user btn-block">

                    </form>

                    <hr>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">MEUS AGENDAMENTOS</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>STATUS</th>
                                            <th>CLIENTE</th>
                                            <th>ESPECIALISTA</th>
                                            <th>PROCEDIMENTO</th>
                                            <th>DATA</th>
                                            <th>HORA</th>
                                            <th>OPÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>STATUS</th>
                                            <th>CLIENTE</th>
                                            <th>ESPECIALISTA</th>
                                            <th>PROCEDIMENTO</th>
                                            <th>DATA</th>
                                            <th>HORA</th>
                                            <th>OPÇÃO</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                            $select = "SELECT `id`, `status`, DAY(data) as dia, MONTH(data) as mes, YEAR(data) as ano, `id_cliente`, `id_usuario`, `id_procedimento`, `hora` FROM `agenda`";
                                            $query  = mysqli_query($conn, $select);

                                            while($row = mysqli_fetch_array($query)){

                                                $id         = $row['id'];
                                                $status     = $row['status'];
                                                $dia        = $row['dia'];
                                                $mes        = $row['mes'];
                                                $ano        = $row['ano'];
                                                $hora       = $row['hora'];

                                                $id_cliente     = $row['id_cliente'];
                                                $select_cliente = "SELECT `nome` FROM `cliente`";
                                                $query_cliente  = mysqli_query($conn, $select_cliente);
                                                $row_cliente    = mysqli_fetch_array($query_cliente);
                                                $cliente        = $row_cliente['nome'];

                                                $id_usuario     = $row['id_usuario'];
                                                $select_usuario = "SELECT `nome` FROM `usuario`";
                                                $query_usuario  = mysqli_query($conn, $select_usuario);
                                                $row_usuario    = mysqli_fetch_array($query_usuario);
                                                $usuario        = $row_usuario['nome'];

                                                $id_procedimento     = $row['id_procedimento'];
                                                $select_procedimento = "SELECT `nome` FROM `procedimento`";
                                                $query_procedimento  = mysqli_query($conn, $select_procedimento);
                                                $row_procedimento    = mysqli_fetch_array($query_procedimento);
                                                $procedimento        = $row_procedimento['nome'];
                                                
                                                echo "<tr>
                                                        <td>
                                                            $id
                                                        </td>
                                                        <td>
                                                            $status
                                                        </td>
                                                        <td>
                                                            $cliente
                                                        </td>
                                                        <td>
                                                            $usuario
                                                        </td>    
                                                        <td>
                                                            $procedimento
                                                        </td>                                                                                                            
                                                        <td>
                                                            $dia / $mes / $ano
                                                        </td>
                                                        <td>
                                                            $hora
                                                        </td>
                                                        <td>
                                                            <a class='btn btn-success btn-circle' href='check.php?id=1'>
                                                                <i class='fas fa-check-circle'></i>
                                                            </a>
                                                            <a class='btn btn-warning btn-circle' href='check.php?id=2'>
                                                                <i class='fas fa-exclamation-triangle'></i>
                                                            </a>
                                                            <a class='btn btn-danger btn-circle' href='check.php?id=3'>
                                                                <i class='fas fa-times'></i>
                                                            </a>                                                                                                                        
                                                        </td>
                                                    </tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>

</body>

</html>