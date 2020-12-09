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
    <title>Pedidos</title>
    <link rel="icon" type="image/png" href="images/icon/cerveza.png" />
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

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
    <link rel="stylesheet" type="text/css" href="vendor/font/flaticon.css">
    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <script src="validaciones/validar_pedido.js"></script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        
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
                                        <a href="Pedido.php">Nuevo</a>
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
                                <?php
                                include 'conexion/conexion.php';
                                    $sql = "SELECT * FROM producto";
                                    $noti = mysqli_query($conexion, $sql);
                                    $cuantas = mysqli_num_rows($noti);
                                ?>

                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity"><?php echo $cuantas; ?></span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>Tu tienes <?php echo $cuantas; ?> notifiaciones</p>
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
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
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
                                                        <a href="#">john doe</a>
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
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="container">
                                    <div class="login-content">
                                            <form  method="POST">
                                                <div class="form-group">
                                                    <label>Identificación</label>
                                                    <input class="au-input au-input--full" type="text" name="Id_Cliente" >
                                                </div>
                                               
                                                <button class="btn btn-info" type="submit">Consultar Cliente</button> 
                                            </form>
                                            <br>
                                            <?php
                                                 if($_POST){
                                                    require('conexion/conexionConsulta.php');
                                                    $con =  Conectar();
                                                    $Id_Cliente = $_POST['Id_Cliente'];
                                                    $SQL= 'SELECT Id_Cliente, Nombre, Barrio, Telefono1, Telefono2, Direccion FROM cliente WHERE Id_Cliente = :Id_Cliente';
                                                    $stmt = $con->prepare($SQL);
                                                    $result=$stmt->execute(array(':Id_Cliente'=>$Id_Cliente));
                                                    $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
                                                    if(count($rows)){
                                                         foreach($rows AS $row){?>
                                                            <div class="login-content">
                                                                <div class="form-group">
                                                                    <label>Identificación</label>
                                                                    <input class="au-input au-input--full" type="text" name="Id_Clientes"  value="<?php print($row->Id_Cliente)?>">
                                                                 </div>
                                                                <div class="form-group">
                                                                    <label>Nombres y Apellidos</label>
                                                                    <input class="au-input au-input--full" type="text" name="Nombre" value="<?php print($row->Nombre)?>">
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Barrio</label>
                                                                <input class="au-input au-input--full" type="text" name="Barrio" value="<?php print($row->Barrio)?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Telefono 1</label>
                                                                    <input class="au-input au-input--full" type="text" name="Telefono1"value="<?php print($row->Telefono1)?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Teléfono 2</label>
                                                                    <input class="au-input au-input--full" type="text" name="Telefono2" value="<?php print($row->Telefono2)?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Dirección</label>
                                                                    <input class="au-input au-input--full" type="text" name="Direccion" value="<?php print($row->Direccion)?>">
                                                                </div>
                                                            </div>
                                                        <?php }
                                                    }else{
                                                        echo '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        El cliente no existe en la base de datos
                                                      </div>';
                                                    }
                                                  }
                                            ?>
                                            </div>
                            </div>
                        </div>             
                        <div class="row">
                        <div class="container">
                                    <div class="login-content">
                                            <form action="funciones/registrar_pedido.php" method="post">
                                            
                                                <div class="form-group">
                                                    <label>Pedido</label>
                                                    <textarea name="Pedido" id="textarea-in" rows="7" placeholder="Content..." class="form-control"></textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Cantidad</label>
                                                    <input class="au-input au-input--full" type="text" name="cantidad">
                                                </div>
                                                <div class="form-group">
                                                    <label>Observaciones</label>
                                                    <input class="au-input au-input--full" type="text" name="Observaciones">
                                                </div>
                                                <div class="form-group">
                                                    <label>Hora</label>
                                                    <?php date_default_timezone_set("America/Bogota") ?>
                                                    <input class="au-input au-input--full" type="time" name="Hora" value="<?php echo date("h:i a")?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Fecha</label>
                                                    <?php date_default_timezone_set("America/Bogota") ?>
                                                    <input class="au-input au-input--full" type="date" name="Fecha" value="<?php echo date("Y-m-d")?>">
                                                </div>
                                                <div class="form_group">
                                                    <label>Tipo de Pago</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="Tipo_Pago" id="select" class="form-control">
                                                        <option value="0">Seleccione</option>
                                                        <option value="Tarjeta">Tarjeta</option>
                                                        <option value="Efectivo">Efectivo</option>
                                                    </select>
                                                </div>
                                                <br>

                                                <div class="form-group">
                                                    <label>Total a Pagar</label>
                                                    <input class="au-input au-input--full" type="number" name="Total">
                                                </div>
                                
                                                
                                                
                                                <button class="btn btn-success" type="submit">Registrar Pedido</button>
                                               <div class="btn btn-link">
                                                <p>
                                                    <a href="Cliente.php">Nuevo Cliente</a>
                                                </p>
                                            </div>
                                
                                            </form>
                                            </div>
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

</body>

</html>
<!-- end document-->
