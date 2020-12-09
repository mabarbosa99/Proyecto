<?php
    include_once 'conexion/conexion_login.php';
    
    session_start();
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: index.php');
            break;

            case 2:
            	header('location: index2.php');
            break;

			case 3:
            	header('location: index3.php');
            break;
            default:
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Iniciar Sesion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icon/cerveza.png" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorLogin/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fontsLogin/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fontsLogin/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fontsLogin/poppins/Poppins-Medium.ttf">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorLogin/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendorLogin/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorLogin/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorLogin/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendorLogin/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cssLogin/util.css">
	<link rel="stylesheet" type="text/css" href="cssLogin/main.css">
	
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('imagesLogin/bg-02.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="login100-form validate-form" autocomplete="off">
				
					<center>
					<img class="" src="imagesLogin/logo.png" alt="AVATAR">
					</center>
					<span class="login100-form-title p-b-49">

						<h3>Iniciar Sesión</h3>
						
					</span>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Ingrese un usuario">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="username" placeholder="Usuario">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese una contraseña">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="password" placeholder="Contraseña">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="forget-pass.php">
							Olvidaste tu contraseña?
						</a>
					</div>
					<?php
					if(isset($_POST['username']) && isset($_POST['password'])){
						$username = $_POST['username'];
						$password = $_POST[('password')];

						$bd = new Database();
						$query = $bd->connect()->prepare('SELECT * FROM usuarios WHERE usuario = :username AND contraseña = :password');
						$query->execute(['username' => $username, 'password' => sha1($password)]);

						$row = $query->fetch(PDO::FETCH_NUM);

						
						
						if($row == true){
							
							$rol = $row[3];
							
							$_SESSION['rol'] = $rol;
							switch($rol){
								case 1:
									
									header('location: index.php');
								break;

								case 2:
									header('location: index2.php');
								break;
								
								case 3:
									header('location: index3.php');
								break;
								case 4:
									header('location: index4.php');
								break;

								default:
							}
						}else{
							// no existe el usuario
							echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							El usuario o la contraseña son incorrectos
						  </div>';
						}

						

					}
					?>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
							<span class="spinner-border spinner-border-sm mr-2"></span>
								Ingresar
							</button>
						</div>
					</div>
					
					

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendorLogin/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorLogin/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorLogin/bootstrap/js/popper.js"></script>
	<script src="vendorLogin/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorLogin/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorLogin/daterangepicker/moment.min.js"></script>
	<script src="vendorLogin/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendorLogin/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="jsLogin/main.js"></script>

</body>
</html>