<?php


session_start();
unset($_SESSION['consulta']);
$nombre = $_SESSION['rol'];

if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 4){
        header('location: login.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Inicio</title>
    <link rel="icon" type="image/png" href="images/icon/cerveza.png" />

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="vendor/font/flaticon.css">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
    <script src="librerias/select2/js/select2.js"></script>
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    

</head>

<body class="animsition">
    <div class="page-wrapper">
       

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="">
                            <a class="js-arrow" href="index4.php">
                                <i class="flaticon-casa"></i>Inicio
                            </a>

                            <li class="">
                            <a class="js-arrow" href="#">
                            <i class="fas fa-list"></i>Pedidos</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="index4.php">Lista</a>
                                    </li>
                                    <li>
                                        <a href="terminados.php">Terminados</a>
                                    </li>
                                
                                </ul>
                            </li>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                <?php
                                include 'conexion/conexion.php';
                                    $sql = "SELECT * FROM producto";
                                    $noti = mysqli_query($conexion, $sql);
                                    $cuantas = mysqli_num_rows($noti);
                                ?>

                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                
                                            </div>
                                            <div class="notifi__item">
                                               
                                                <?php
                                                include 'conexion/conexion.php';                
                                                while($no = mysqli_fetch_array($noti)) {
                                                
                                                $sql = "SELECT Id_Producto, Tipo_Producto, Nombre, Precio, Volumen FROM producto";
                                                $users = mysqli_query($conexion, $sql);
                                                $usa = mysqli_fetch_array($users);
                                                
                                                ?>
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="fa fa-bell"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Hay un nuevo producto<?php $usa?></p>
                                                </div>
                                                
                                                <?php } ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/user.png" alt="John Doe" />
                                        </div>
                                        
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/user.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"></a>
                                                    </h5>
                                                    <span class="email"></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
             
            <div id="tabla" class="main-content"></div>
            
            <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Realizar pedido</h4>
                    </div>
                    <div class="modal-body">
                            <input type="text" hidden="" id="Id_Pedido" name="">
                            <label>Pedido</label>
                            <textarea type="text" name="" id="Pedido" rows="4"  class="form-control" disabled></textarea>
                            <label>Cantidad</label>
                            <input type="text" name="" id="cantidad" class="form-control input-sm" disabled -/>
                            <label>Observaciones</label>
                            <input type="text" name="" id="Observaciones" class="form-control input-sm" disabled>
                            <label>Pago</label>
                            <input type="text" name="" id="Tipo_pago" class="form-control input-sm" disabled>
                            <label>Total</label>
                            <input type="text" name="" id="Total" class="form-control input-sm" disabled>
                            <label>Estado</label>
                            <input type="text" name="" id="Estado" class="form-control input-sm" disabled>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="actualizadatos" data-dismiss="modal">Realizar</button>
                        
                    </div>
                </div>
            </div>
</div>
    

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="js/ajax.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

</body>

<script type="text/javascript">

    $(document).ready( function () {
        $('#tabla').load('tablaTerminados.php');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#actualizadatos').click(function(){
          actualizaDatos();
          $('#tabla').load('tabla.php');
        });

    });
</script>
</html>
<!-- end document-->

