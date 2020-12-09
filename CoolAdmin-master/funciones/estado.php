<?php 
	require_once "../conexion/conexion.php";

    $id=$_POST['Id_Pedido'];

	$sql="UPDATE pedido set Estado = 'En proceso' where Id_Pedido='$id'";
	echo $result=mysqli_query($conexion,$sql);

?>