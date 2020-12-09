<?php
        
        
        session_start();
        if(!isset($_SESSION['rol'])){
            header('location: login.php');
        }else{
            if($_SESSION['rol'] != 2){
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Page-->
    <title>Registrar Empleado</title>
    <link rel="icon" type="image/png" href="images/icon/cerveza.png" />

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="vendor/font/flaticon.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/push.min.js"></script>
    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
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
    <link href="css/estilos.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
                                <i class="flaticon-casa"></i>Inicio</a>
                            
                            <li class="">
                                <a class="js-arrow" href="#">
                                <i class="fa fa-user"></i>Domiciliario</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="Domiciliario.php">Nuevo</a>
                                        </li>
                                        <li>
                                        <a href="Lista_d.php">Lista</a>
                                        </li>
                                
                                    </ul>
                            </li>
                            <li class="">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Empleado</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="Empleado.php">Nuevo</a>
                                    </li>
                                    <li>
                                        <a href="Lista_e.php">Lista</a>
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
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="container">
                                    <div class="login-content">
                                    <div class="overview-wrap">
                                        <h2>Registrar Empleado</h2>
                                    </div>
                                    <br>
                                        <form action="funciones/registrar_empleado.php"  method="post" class="formulario" id="formulario">
                                            <!-- Grupo: Identificacion -->
                                            <div class="formulario__grupo" id="grupo__identificacion">
                                                <label for="identificacion" class="formulario__label">Identificacion</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="identificacion" id="identificacion" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">La identificación solo puede contener numeros y un maximo de 10 dígitos</p>
                                            </div>

                                            <!-- Grupo: Nombre -->
                                            <div class="formulario__grupo" id="grupo__nombre">
                                                <label for="nombre" class="formulario__label">Nombre</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="nombre" id="nombre" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El nombre tiene que ser de 4 a 16 dígitos y solo puede contener letras</p>
                                            </div>

                                            <!-- Grupo: Apellido -->
                                            <div class="formulario__grupo" id="grupo__apellido">
                                                <label for="apellido" class="formulario__label">Apellido</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="apellido" id="apellido" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El apellido tiene que ser de 4 a 16 dígitos y solo puede contener letras</p>
                                            </div>

                                            <!-- Grupo: Teléfono -->
                                            <div class="formulario__grupo" id="grupo__telefono">
                                                <label for="telefono" class="formulario__label">Teléfono</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="telefono" id="telefono" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos</p>
                                            </div>

                                            <!-- Grupo: Direccion -->
                                            <div class="formulario__grupo" id="grupo__direccion">
                                                <label for="direccion" class="formulario__label">Dirección</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="direccion" id="direccion" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">La dirección tiene que ser mayor a 4 digitos</p>
                                            </div>

                                            <!-- Grupo: Correo Electronico -->
                                            <div class="formulario__grupo" id="grupo__correo">
                                                <label for="correo" class="formulario__label">Correo Electrónico</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="email" class="formulario__input" name="correo" id="correo">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                                            </div>

                                            <div class="formulario__mensaje" id="formulario__mensaje">
                                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                                            </div>

                                            
                                            <div class="formulario__grupo formulario__grupo-btn-enviar">
                                            <input type="submit" onclick="registrar()" name="enviar" id="enviar" value="Registrar" class="au-btn au-btn--block au-btn--green m-b-20">
                                                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
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
    <!-- Jquery JS-->
    <script src="js/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
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
