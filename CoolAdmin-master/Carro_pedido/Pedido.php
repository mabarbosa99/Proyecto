<?php
      session_start();

      $nombre = $_SESSION['rol'];
      
      if(!isset($_SESSION['rol'])){
          header('location: ../login.php');
      }else{
          if($_SESSION['rol'] != 3){
              header('location: ../login.php');
          }
      }

    $_SESSION['detalle'] = array();

require "conexion.php";
require "Producto.php";

$objProducto = new Producto();
$resultado_producto = $objProducto->get();
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
    <link rel="icon" type="image/png" href="../images/icon/cerveza.png" />
    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

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
    <link rel="stylesheet" type="text/css" href="../vendor/font/flaticon.css">
    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

    <link href="libs/css/bootstrap.css" rel="stylesheet">
 	<script src="libs/js/jquery.js"></script>
	<script src="libs/js/jquery-1.8.3.min.js"></script>
	
   	
    <script type="text/javascript" src="libs/ajax.js"></script>
	

    <link rel="stylesheet" href="libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
	<script src="libs/js/alertify/lib/alertify.min.js"></script>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                    <img src="../images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="">
                            <a class="js-arrow" href="../index.php">
                                <i class="flaticon-casa"></i>Inicio</a>
                        <li class="">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-user"></i>Cliente</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="../Cliente.php">Nuevo</a>
                                    </li>
                                    <li>
                                        <a href="../Lista_c.php">Lista</a>
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
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="fa fa-bell"></i>
                                                </div>
                                                <div class="content">
                                                </div>
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
                                                    <label>Identificación cliente</label>
                                                    <input class="au-input au-input--full" type="text" name="Id_Cliente" >
                                                </div>
                                                <button class="btn btn-info" type="submit">Consultar Cliente</button> 
                                                <a href='../Cliente.php'><button class="btn btn-info">Nuevo Cliente</button></a>
                                            </form>
                                            <br>
                                            <?php
                                                 if($_POST){
                                                    require('../conexion/conexionConsulta.php');
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
                                                                    <input class="au-input au-input--full" type="text" name="IdClientes" id="IdClientes" value="<?php print($row->Id_Cliente)?>">
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
                        </div><br>            
 		
		<center>
 		<div class="row">
         
		 	<div class="col-md-4">
				<div class="form-group"><font color="black" size="6">Producto:</font>
				<select class="selectpicker" name="cbo_producto" id="cbo_producto" data-show-subtext="true" data-live-search="true">
				<option value="0">Seleccione un producto</option>
					<?php foreach($resultado_producto as $producto):?>
						<option id="producto" value="<?php echo $producto['id']?>"><?php echo $producto['nombre']?> - <?php echo $producto['volumen']?></option>
					<?php endforeach;?> 	         
					</select>
				</div>
			</div>

			<div class="col-md-4">
				<div><font color="black" size="6">Cantidad:</font><br>
				  <input class="au-input au-input--full" id="txt_cantidad" name="txt_cantidad" type="text" placeholder="Ingrese cantidad" autocomplete="off" />
				</div>
			</div>

			<div class="col-md-1">
				<div style="margin-top: 45px;">
				<button type="button" class="btn btn-primary btn-agregar-producto">AGREGAR</button>
				</div>
			</div>
		</div>
		</center>
		<br>
		<center>
        <form action="Controller/ProductoController.php?page=3" method="post">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><font size="6" >Productos</font></h3>
                </div>
                <div class="panel-body detalle-producto">
                    <?php if(count($_SESSION['detalle'])>0){?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($_SESSION['detalle'] as $k => $detalle){ 
                                ?>
                                <tr>
                                    <td><?php echo $detalle['producto'];?></td>
                                    <td><?php echo $detalle['cantidad'];?></td>
                                    <td><?php echo $detalle['precio'];?></td>
                                    <td><?php echo $detalle['subtotal'];?></td>
                                    <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    <?php }else{?>
                    <div class="panel-body"><font size="3" > No hay productos agregados </font></div>
                    <?php }?>
                </div>
            </div>
            </center>
            <div class="form-group">
                <label>Observaciones</label>
                <input class="au-input au-input--full" type="text" name="Observaciones" id="Observaciones">
            </div>
            <div class="form-group">
                <label>Fecha</label>
                <?php date_default_timezone_set("America/Bogota") ?>
                <input class="au-input au-input--full" type="datetime" name="Fechahora" id="Fechahora" value="<?php echo date("Y-m-d H:i:s")?>">
            </div>
            <div class="form-group">
            <label>Tipo de pago</label><br>
            <input class="au-input au-input--full" type="text" name="Tipopago" id="Tipopago"> 
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                <button type="button" class="au-btn au-btn--block au-btn--green m-b-20 guardar-producto">Registrar</button>
                </div>
            </div>
        </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> 

</body>

</html>
<!-- end document-->
