<?php 
	require_once "../conexion/conexion.php";

	$id=$_POST['id'];

	$sql="DELETE FROM producto WHERE id='$id'";
	echo $result=mysqli_query($conexion,$sql);
 ?>