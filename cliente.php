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
                    <h1 class="h3 mb-2 text-gray-800">CLIENTES</h1>
                    <hr>

                    <form method="POST" action="add_cliente.php">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>NOME:</label>
                                <input type="text" name="nome" class="form-control form-control-user" required>
                            </div>
                            <div class="col-sm-6">
                                <label>CPF:</label>
                                <input type="text" name="cpf" class="form-control form-control-user" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>EMAIL:</label>
                                <input type="email" name="email" class="form-control form-control-user" required>
                            </div>
                            <div class="col-sm-6">
                                <label>DATA DE NASCIMENTO:</label>
                                <input type="date" name="data" class="form-control form-control-user" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>CELULAR:</label>
                                <input type="text" name="celular" class="form-control form-control-user" required>
                            </div>
                            <div class="col-sm-6">
                                <label>STATUS:</label>
                                <select name="status" class="form-control">
                                    <option value="ativo">ATIVO</option>
                                    <option value="inativo">INATIVO</option>
                                </select>
                            </div>
                        </div>

                        <input type="submit" name="incluir" value="ADICIONAR" class="btn btn-primary btn-user btn-block">

                    </form>

                    <hr>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">MEUS CLIENTES</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>STATUS</th>
                                            <th>NOME</th>
                                            <th>IDADE</th>
                                            <th>CPF</th>
                                            <th>CELULAR</th>
                                            <th>EMAIL</th>
                                            <th>OPÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>STATUS</th>
                                            <th>NOME</th>
                                            <th>IDADE</th>
                                            <th>CPF</th>
                                            <th>CELULAR</th>
                                            <th>EMAIL</th>
                                            <th>OPÇÃO</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                            $select = "SELECT `id`, `nome`, DAY(data_nasc) as dia, MONTH(data_nasc) as mes, YEAR(data_nasc) as ano, data_nasc, `status`, `cpf`, `celular`, `email` FROM `cliente`";
                                            $query  = mysqli_query($conn, $select);

                                            while($row = mysqli_fetch_array($query)){

                                                $id         = $row['id'];
                                                $nome       = $row['nome'];
                                                $dia        = $row['dia'];
                                                $mes        = $row['mes'];
                                                $ano        = $row['ano'];
                                                $data       = $row['data_nasc'];
                                                $status     = $row['status'];
                                                $cpf        = $row['cpf'];
                                                $celular    = $row['celular'];
                                                $email      = $row['email'];  
                                                
                                                $d1 = new DateTime('now');
                                                $d2 = new DateTime($data);
                                                $intervalo = $d1->diff( $d2 );
                                                
                                                echo "<tr>
                                                        <td>
                                                            $id
                                                        </td>
                                                        <td>
                                                            $status
                                                        </td>
                                                        <td>
                                                            $nome
                                                        </td>
                                                        <td>
                                                            $intervalo->y anos
                                                        </td>
                                                        <td>
                                                            $cpf
                                                        </td>
                                                        <td>
                                                            $celular
                                                        </td>
                                                        <td>
                                                            $email
                                                        </td>
                                                        <td>
                                                            <a class='btn btn-info btn-circle' href='#'>
                                                                <i class='fas fa-info-circle'></i>
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

</body>

</html>