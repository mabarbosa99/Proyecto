<?php

if(isset($_POST['consultar']))
    {
      include("conexion.php");

        $doc = $_POST['consultar'];
        if($doc=="") //VERIFICO QUE AGREGEN UN DOCUMENTO OBLIGATORIAMENTE.
          {echo "Digita un documento por favor. (Ej: 123)";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT Identificacion, Nombre, Apellido, Telefono FROM supervisor WHERE Identificacion = $doc");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Documento</center></b></td>
                  <td><b><center>Nombre</center></b></td>
                  <td><b><center>Direccion</center></b></td>
                  <td><b><center>Telefono</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['Identificacion']."</td>
                  <td>".$consulta['Nombre']."</td>
                  <td>".$consulta['Apellido']."</td>
                  <td>".$consulta['Telefono']."</td>
                </tr>
              </table>
            ";
          }
        }
    }



       
        
        session_start();
        if(!isset($_SESSION['rol'])){
            header('location: login.php');
        }else{
            if($_SESSION['rol'] != 1){
                header('location: login.php');
            }
        }
        
        
      
?>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#div-btn1').on('click', function() {
        $("#central").load('inc/presentation.php');
        return false;
    });
    
});
</script>
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
    <title>Registrar Supervisor</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            
        </header>
        <!-- END HEADER MOBILE-->

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
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Inicio</a>
                            
                            <li class="">
                                <a class="js-arrow" href="#">
                                <i class="fa fa-user"></i>Supervisor</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="chart.php">Nuevo</a>
                                        </li>
                                        <li>
                                        <a href="table.php">Lista</a>
                                        </li>
                                
                                    </ul>
                            </li>
                            <li class="">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-box"></i>Producto</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="form.php">Nuevo</a>
                                    </li>
                                    <li>
                                        <a href="calendar.php">Lista</a>
                                    </li>
                                
                                </ul>
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
                        
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#"></a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#"></a>
                                                        </h5>
                                                        <span class="email">johndoe@example.com</span>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-account"></i>Account</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
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
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="container">
                                
                                    <div class="login-content">
                                        <div class="login-logo">
                                            <a href="#">
                                                <legend style=color:#000000>Registrar supervisor</legend>
                                            </a>
                                        </div>
                                        <form class="form-header" method="POST">
                                                <input class="au-input au-input--xl" type="text" name="consultar"/>
                                                
                                                <button class="au-btn--submit" type="submit">
                                                <a href="buscar.php" style="color:wheat" class="zmdi zmdi-search">
                                                    
                                                </a>
                                                </button>
                                                
                                        </form>
                                        <div class="">
                                            <form action="registrar.php" method="post">
                                                <div class="form-group">
                                                    <label>Identificación</label>
                                                    <input class="au-input au-input--full" type="text" name="Identificacion" value="<?php echo $consulta['Identificacion'];?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input class="au-input au-input--full" type="text" name="Nombre" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Apellido</label>
                                                    <input class="au-input au-input--full" type="text" name="Apellido" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Telefono</label>
                                                    <input class="au-input au-input--full" type="text" name="Telefono" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input class="au-input au-input--full" type="text" name="Direccion" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Correo</label>
                                                    <input class="au-input au-input--full" type="email" name="Correo_electronico" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Usuario</label>
                                                    <input class="au-input au-input--full" type="text" name="Usuario" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Contraseña</label>
                                                    <input class="au-input au-input--full" type="password" name="Contraseña" >
                                                </div>
                                                
                                                
                                                <input type="submit" name="enviar" value="Registrar" class="au-btn au-btn--block au-btn--green m-b-20">
                                                
                                                
                                                
                                            </form>
                                            <a href="buscar.php" class="au-btn au-btn--block au-btn--green m-b-20">
                                                <input type="submit" name="consultar" value="Consultar" class="au-btn au-btn--block au-btn--green m-b-20">
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->

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

</body>

</html>
<!-- end document-->
