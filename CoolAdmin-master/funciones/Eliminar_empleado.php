<?php 
	require_once "../conexion/conexion.php";

	$id_empleado=$_POST['id_empleado'];

	$sql="DELETE FROM empleado WHERE id_empleado='$id_empleado'";
	echo $result=mysqli_query($conexion,$sql);
 ?>