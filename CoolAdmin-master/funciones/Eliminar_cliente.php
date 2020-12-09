<?php 
	require_once "../conexion/conexion.php";

	$Id_Cliente=$_POST['Id_Cliente'];

	$sql="DELETE FROM cliente WHERE Id_Cliente='$Id_Cliente'";
	echo $result=mysqli_query($conexion,$sql);
 ?>