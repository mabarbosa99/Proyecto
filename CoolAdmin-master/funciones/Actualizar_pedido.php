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

      include("../conexion/conexion.php");
      if(isset($_GET['Id_Pedido'])){
          $Id_Pedido = $_GET['Id_Pedido'];
          $query = "SELECT * FROM pedido WHERE Id_Pedido = $Id_Pedido";
          $result = mysqli_query($conexion, $query);
          if(mysqli_num_rows($result)==1){
              $row = mysqli_fetch_array($result);
              $Id_Pedido= $row['Id_Pedido'];
              $Pedido= $row['Pedido'];
              $Observaciones= $row['Observaciones'];
              $Fecha= $row['Fechahora'];
              $Tipo_Pago= $row['Tipopago'];
              $Total= $row['Total'];
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
    <title>Editar Pedido</title>
    <link rel="icon" type="image/png" href="../images/icon/cerveza.png" />
    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="../vendor/font/flaticon.css">
    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/estilos.css" rel="stylesheet" media="all">
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>


<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="../index.php">
                                <i class="flaticon-casa"></i>Inicio</a>
                            
                                <li class="">
                                <a class="js-arrow" href="#">
                                <i class="fa fa-user"></i>Cliente</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="../chart.php">Nuevo</a>
                                        </li>
                                        <li>
                                        <a href="../table.php">Lista</a>
                                        </li>
                                
                                    </ul>
                            </li>
                            <li class="">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-inbox"></i>Pedido</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="../Carro_pedido/Pedido.php">Nuevo</a>
                                    </li>
                                    <li>
                                        <a href="../Lista_p.php">Lista</a>
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
                                            <img src="../images/icon/user.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../images/icon/user.png" alt="John Doe" />
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
                                                        <i class="zmdi zmdi-account"></i>Cuenta</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Configuración</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../logout.php">
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
            <!-- END HEADER DESKTOP-->

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="container">
                                
                                    <div class="login-content">
                                        <div class="login-logo">
                                        <a href="#">
                                                <legend style=color:#000000>Editar pedido</legend>
                                            </a>
                                        </div>
                                        <div class="login-form">
                                            
                                            <form action="Actualizar_pedidoC.php" method="POST"  class="formulario" id="formulario">
                                            <div class="formulario__grupo" id="grupo__id">
                                                <label for="id" class="formulario__label">Número del Pedido</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="id" id="id" value="<?php echo $Id_Pedido?>">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">La identificación solo puede contener numeros y un maximo de 10 dígitos</p>
                                            </div>

                                            <!-- Grupo: Nombre -->
                                            <div class="formulario__grupo" id="grupo__nombre">
                                                <label for="nombre" class="formulario__label">Pedido</label>
                                                <div class="formulario__grupo-input">
                                                <textarea name="pedido" id="pedido" rows="7" placeholder="Content..." class="form-control"><?php echo $Pedido?>"</textarea>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El nombre tiene que ser de 4 a 16 dígitos y solo puede contener letras</p>
                                            </div>

                                            <!-- Grupo: Apellido -->
                                            <div class="formulario__grupo" id="grupo__barrio">
                                                <label for="barrio" class="formulario__label">Observaciones</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="Observaciones" id="Observaciones"  value="<?php echo $Observaciones?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El apellido tiene que ser de 4 a 16 dígitos y solo puede contener letras</p>
                                            </div>

                                            <!-- Grupo: Teléfono -->
                                            <div class="formulario__grupo" id="grupo__telefono">
                                                <label for="telefono" class="formulario__label">Fecha y Hora</label>
                                                <div class="formulario__grupo-input">
                                                <?php date_default_timezone_set("America/Bogota") ?>
                                                    <input type="text" class="formulario__input" name="Fechahora" id="Fechahora" value="<?php echo date("Y-m-d H:i:s")?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos</p>
                                            </div>

                                             <!-- Grupo: Teléfono -->
                                             <div class="formulario__grupo" id="grupo__telefonos">
                                                <label for="telefonos" class="formulario__label">Tipo de Pago</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="Tipopago" id="tipopago" value="<?php echo $Tipo_Pago?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos</p>
                                            </div>

                                            <!-- Grupo: Direccion -->
                                            <div class="formulario__grupo" id="grupo__direccion">
                                                <label for="direccion" class="formulario__label">Total</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="Total" id="Total" value="<?php echo $Total?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">La dirección tiene que ser mayor a 4 digitos</p>
                                            </div>

                                            <div class="formulario__grupo formulario__grupo-btn-enviar">
                                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="editar" type="submit">Editar</button>
                                            </div>
                                            </form>
                                            
                                            
                                    </div>
                                </div>
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
    <script src="../js/formulario.js"></script>
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->
