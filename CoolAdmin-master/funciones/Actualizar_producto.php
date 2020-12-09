<?php
session_start();

$nombre = $_SESSION['rol'];

if(!isset($_SESSION['rol'])){
    header('location: ../login.php');
}else{
    if($_SESSION['rol'] != 1){
        header('location: ../login.php');
    }
}

$consulta = ModificarProducto($_GET['id']);

        function ModificarProducto($id)

        {
            include "../conexion/conexion.php";
            
            $sentencia="SELECT tipo_producto, nombre, precio, volumen FROM producto WHERE id='".$id."' ";
            $resultado=mysqli_query($conexion, $sentencia) or die (mysqli_error($resultado));
            $filas=mysqli_fetch_assoc($resultado);

            return [

            $filas['tipo_producto'],
            $filas['nombre'],
            $filas['precio'],
            $filas['volumen']

            ];

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
    <title>Editar producto</title>
    <link rel="icon" type="image/png" href="../images/icon/cerveza.png" />

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="../vendor/font/flaticon.css">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

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
        
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
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
                                <i class="fa fa-user"></i>Supervisor</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="nuevoSupervisor.php">Nuevo</a>
                                        </li>
                                        <li>
                                        <a href="supervisor.php">Lista</a>
                                        </li>
                                
                                    </ul>
                            </li>
                            <li class="">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-list"></i>Producto</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="nuevoProducto.php">Nuevo</a>
                                    </li>
                                    <li>
                                        <a href="producto.php">Lista</a>
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
                                        <span class="quantity"></span>
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
                                                            <i class="zmdi zmdi-settings"></i>Configuraciones</a>
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

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="container">
                                
                            <div class="login-content">
                                    <div class="overview-wrap">
                                        <h2>Editar producto</h2>
                                    </div>
                                    <br>
                                    <form action="Actualizar_producto_2.php"  method="post" class="formulario" id="formulario">
                                            
                                            <!-- Grupo: Tipo -->
                                            <div class="formulario__grupo" id="grupo__tipo">
                                                <label for="tipo" class="formulario__label">Tipo</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="tipo" id="tipo" value="<?php echo $consulta[0]?>">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo puede contener letras y un maximo de 10 dígitos</p>
                                            </div>

                                            <!-- Grupo: Nombre -->
                                            <div class="formulario__grupo" id="grupo__nombre">
                                                <label for="nombre" class="formulario__label">Nombre</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="nombre" id="nombre" value="<?php echo $consulta[1]?>">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo puede contener letras y un maximo de 10 dígitos</p>
                                            </div>

                                            <!-- Grupo: Precio -->
                                            <div class="formulario__grupo" id="grupo__precio">
                                                <label for="precio" class="formulario__label">Precio</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="precio" id="precio" value="<?php echo $consulta[2]?>">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El precio solo puede contener numeros</p>
                                            </div>

                                            <!-- Grupo: Volumen -->
                                            <div class="formulario__grupo" id="grupo__Volumen">
                                                <label for="Volumen" class="formulario__label">Volumen</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="Volumen" id="Volumen" value="<?php echo $consulta[3]?>">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El volumen solo puede contener letras y numeros</p>
                                            </div>

                                            <div class="formulario__mensaje" id="formulario__mensaje">
                                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                                            </div>

                                            <div class="formulario__grupo formulario__grupo-btn-enviar">
                                            <input type="submit" onclick="editarProducto()" name="enviar" id="enviar" value="Actualizar" class="au-btn au-btn--block au-btn--green m-b-20">
                                            </div>
                                            <!-- Grupo: id -->
                                            <div class="formulario__grupo" id="grupo__identificacion">
                                                <div class="formulario__grupo-input">
                                                    <input type="hidden" class="formulario__input" name="id" id="id" value="<?php echo $_GET['id']?>">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">La identificación solo puede contener numeros y un maximo de 10 dígitos</p>
                                            </div>
                                        </form>
                                    </div>
                            
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 Licores de la noche Bogotá.</p>
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
