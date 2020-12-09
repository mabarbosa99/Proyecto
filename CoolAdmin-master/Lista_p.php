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
      require 'conexion/conexion.php';
      
      $sql= "SELECT * FROM cliente";
      $resultado=$conexion->query($sql);

      require "conexion/conexion.php";

if(isset($_POST["importar"])){

    //--- LIBRERIA PHP EXCEL --- SECCION 1 ---
    require_once("Classes/PHPExcel/IOFactory.php");
    require_once("Classes/PHPExcel.php");
    
    //--- SECCION 2 --- 
    $archivo = $_FILES["archivo"]["name"];
    $archivo_ruta = $_FILES["archivo"]["tmp_name"];
    $archivo_guardado = "COPIA_".$archivo;

    if(copy($archivo_ruta, $archivo_guardado)){
        // echo "ARCHIVO COPIADO";
    }else{
        echo "NO COPIADO";
    }

    //--- SECCION 3 ---
    $objPHPExcel = PHPEXCEL_IOFactory::load($archivo_guardado);
        
    $objPHPExcel->setActiveSheetIndex(0); //Leer hoja numero 0
        
    $num_filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); // obtener fila de la hoja activa

   
    for($i = 2; $i <= $num_filas; $i++){
           
        //--- NOMBRE 
        $tipo_producto = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        
        //--- IDENTIFICACION 
        $nombre = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        
        //--- CUENTA  
        $precio = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();

        //--- TIPO 
        $volumen = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();

        //--- IMPRIMIR EN HTML 

        // --- SECCION 4 ---
        $sql = "INSERT INTO `producto`(`tipo_producto`, `nombre`, `precio`, `volumen`) VALUES ('$tipo_producto','$nombre','$precio','$volumen')"; 
         
        $resultado = mysqli_query($conexion, $sql);

        if($resultado){

            echo "<script>alert('Se insertaron correctamente'); window.location.href='producto.php'</script>";
            
        }else{
            echo "<script>alert(''Error)</script>";
        }

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
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
    <script src="librerias/select2/js/select2.js"></script>
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" media="all"> 
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
                            <a class="js-arrow" href="index3.php">
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
                                <form class="form-header" action="buscar.php" method="POST">
                                    
                                </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                
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
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        </div>
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="overview-wrap">
                                       <h2>Pedidos</h2>
                                            <div class="table-data__tool-right">
                                                <form name="frm" method="post" action="" enctype="multipart/form-data" accept-charset="UTF-8" id="LayoutGrid1">
                                                    <div id="file_archivo" class="input-group" style="display:table;width:100%;height:16px;z-index:2;">
                                                        
                                                        <label class="input-group-btn">
                                                            <input type="file" name="archivo" style="display:none;" accept=".xls, .xlsx">
                                                            <span class="btn">Seleccionar archivo...</span>
                                                        </label>
                                                        
                                                        <input type="submit" id="btn_cargar" name="importar" value="Cargar" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    </div>
                                                    
                                                    
                                                </form><br>
                                                <a href="ExportarTablaP.php"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    <i class="glyphicon glyphicon-download"></i>Exportar</button></a>
                                                    <a href="Carro_pedido/Pedido.php"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    <i class="zmdi zmdi-plus"></i>Pedido</button></a>
                                                    
                                            </div>
                                        
                                    
                                </div>

                        <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div id="tabla"></div>
                            <!-- END DATA TABLE-->
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
    <script src="js/formulario.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

</body>
<script type="text/javascript">
    $(document).ready( function () {
    $('#table_cliente').DataTable();
    $('#tabla').load('tablaPedidos.php'); 
} );
</script>
</html>
<!-- end document-->
