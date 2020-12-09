<?php 
	require_once "../conexion/conexion.php";

	$id_supervisor=$_POST['id_supervisor'];

	$sql="DELETE FROM supervisor WHERE id_supervisor='$id_supervisor'";
	echo $result=mysqli_query($conexion,$sql);
 ?>