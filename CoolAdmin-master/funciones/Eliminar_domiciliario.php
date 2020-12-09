<?php 
	require_once "../conexion/conexion.php";

	$id_domiciliario=$_POST['id_domiciliario'];

	$sql="DELETE FROM domiciliario WHERE id_domiciliario='$id_domiciliario'";
	echo $result=mysqli_query($conexion,$sql);
 ?>