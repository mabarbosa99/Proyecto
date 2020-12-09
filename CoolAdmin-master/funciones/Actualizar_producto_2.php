<?php

	
	ModificarProducto($_POST['tipo'], $_POST['nombre'], $_POST['precio'], $_POST['Volumen'], $_POST['id']);

	function ModificarProducto($Tipo, $Nombre, $Precio, $Volumen, $id)
	{
		include '../conexion/conexion.php';
		$sentencia="UPDATE producto SET tipo_producto='".$Tipo."', nombre= '".$Nombre."', 
		precio='".$Precio."', volumen='".$Volumen."' WHERE id='".$id."' ";
		mysqli_query($conexion, $sentencia) or die (mysqli_error($sentencia));
	}
?>

<script type="text/javascript">
	
	window.location.href='../calendar.php';
</script>
