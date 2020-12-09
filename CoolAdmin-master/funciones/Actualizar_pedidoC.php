<?php 


	ModificarPedido($_POST['pedido'], $_POST['Observaciones'], $_POST['Fechahora'], $_POST['Tipopago'], $_POST['Total'], $_POST['id']);

	function ModificarPedido($Pedido, $Observaciones,  $Fechahora, $Tipopago, $Total, $id)
	{
		include '../conexion/conexion.php';
		$sentencia="UPDATE pedido SET Pedido='".$Pedido."', Observaciones='".$Observaciones."', Fechahora='".$Fechahora."', Tipopago='".$Tipopago."', Total='".$Total."' WHERE Id_Pedido='".$id."'";
		mysqli_query($conexion, $sentencia) or die (mysqli_error($conexion));
		mysqli_close($conexion);

	}
?>

<script type="text/javascript">

	window.location.href='../Lista_p.php';
</script>