<?php

require "conexion.php";

session_start();
if($_POST){
$username = $_POST['username'];
$pass = $_POST['pass'];

$sql = "SELECT Identificación, Clave, Nombre_apellidos, Tipo_usuario FROM usuarios WHERE Nombre_Usuario='$username'"; 
//var_dump($sql);
$resultado=$conexion->query($sql);
$num = $resultado->num_rows;
	if($num>0){
		$row = $resultado->fetch_assoc();
		$password_bd = $row['Clave']; 
		$pass_c = sha1($pass);

			if($password_bd == $pass_c){
				$_SESSION['Identificación'] = $row['Identificación'];
				$_SESSION['nombre'] = $row['Nombre_apellidos'];
				$_SESSION['Tipo de usuario'] = $row['Tipo_usuario'];
				header("Location:index.php");

			}else{
				echo"La contraseña no coincide";
			}
	}else{
		echo"No existe Usuario";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Iniciar Sesion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imagesLogin/logo.png" type="image/x-icon" />
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="imagesLogin/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorLogin/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fontsLogin/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fontsLogin/iconic/css/material-design-iconic-font.min.css">
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
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Iniciar Sesion
						<img class="" src="imagesLogin/logo.png" alt="AVATAR">
					</span>
					<span >
						
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="username" placeholder="Usuario">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="pass" placeholder="Contraseña">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Olvidaste tu contraseña?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Ingresar
							</button>
						</div>
					</div>

					

					
					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							O registrate usando
						</span>

						<a href="#" class="txt2">
							Registrarse
						</a>
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