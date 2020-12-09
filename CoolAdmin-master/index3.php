<?php


session_start();

$nombre = $_SESSION['rol'];

if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 3){
        header('location: login.php');
    }
}

//Definimos la codificación de la cabecera.
header('Content-Type: text/html; charset=utf-8');
//Importamos el archivo con las validaciones.
require_once 'validaciones.php';
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, sino se guardará null.
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$edad = isset($_POST['edad']) ? $_POST['edad'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
//Este array guardará los errores de validación que surjan.
$errores = array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   //Valida que el campo nombre no esté vacío.
   if (!validaRequerido($nombre)) {
      $errores[] = 'El campo nombre es incorrecto.';
   }
   //Valida la edad con un rango de 3 a 130 años.
   $opciones_edad = array(
      'options' => array(
         //Definimos el rango de edad entre 3 a 130.
         'min_range' => 3,
         'max_range' => 130
      )
   );
   if (!validarEntero($edad, $opciones_edad)) {
      $errores[] = 'El campo edad es incorrecto.';
   }
   //Valida que el campo email sea correcto.
   if (!validaEmail($email)) {
      $errores[] = 'El campo email es incorrecto.';
   }
   //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
   if(!$errores){

      header('Location: validado.php');

      exit;
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
    <title>Empleado</title>
    <link rel="icon" type="image/png" href="images/icon/cerveza.png" />
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="vendor/font/flaticon.css">
    <!-- Main CSS-->
    
    <link href="css/theme.css" rel="stylesheet" media="all">

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
                            <a class="js-arrow" href="index.php">
                                <i class="flaticon-casa"></i>Inicio</a>
                        <li class="">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-user"></i>Cliente</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="Cliente.php">Nuevo</a>
                                    </li>
                                    <li>
                                        <a href="Lista_c.php">Lista</a>
                                    </li>
                                
                                </ul>
                        </li>
                        <li class="">
                            <a class="js-arrow" href="#">
                            <i class="fas fa-inbox"></i>Pedido</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="Carro_pedido/Pedido.php">Nuevo</a>
                                    </li>
                                    <li>
                                        <a href="Lista_p.php">Lista</a>
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
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>Tu tienes notifiaciones</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="fa fa-bell"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Hay un nuevo producto</p>
                                                </div>
                                                
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/user.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"></a>
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
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Cuenta</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Configuración</a>
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
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <center>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <a href="Cliente.php">
                                                    <i class="flaticon-agregar-usuario"></i>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <legend style="color:#555">Nuevo <br> Cliente</legend>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            <a href="Carro_pedido/Pedido.php">
                                                <i class="flaticon-abrir-caja"></i>
                                            </a>
                                            </div>
                                            <div class="text">
                                                <legend style="color:#555">Nuevo <br> Pedido</legend>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            <a href="Lista_c.php">
                                            <i class="flaticon-shopping-list" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                            <div class="text">
                                                <legend style="color:#555">Listado <br> Clientes</legend>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            <a href="Lista_p.php">
                                            <i class="flaticon-shopping-list" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                            <div class="text">
                                                <legend  style="color:#555">Listado <br> Pedidos</legend>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                    </center>
                       
                        
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table id="table_Devoluciones" class="display">
                                        <legend>Devoluciones</legend>
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Asunto</th>
                                                <th>Número del pedido</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                            include "conexion/conexion.php";
                                            $sentencia="SELECT * FROM devolucion";
                                            $resultado=mysqli_query($conexion, $sentencia);
                                            while($filas=mysqli_fetch_assoc($resultado))
                                            {
                                                echo "<tr>";
                                                echo "<td>"; echo $filas['Id_Devolucion']; echo "</td>";
                                                echo "<td>"; echo $filas['Asunto']; echo "</td>";
                                                echo "<td>"; echo $filas['FK_Id_Pedido']; echo "</td>";
                                            }

                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
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
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>
<script type="text/javascript">
    $(document).ready( function () {
    $('#table_Devoluciones').DataTable();
} );
</script>
</html>
<!-- end document-->

