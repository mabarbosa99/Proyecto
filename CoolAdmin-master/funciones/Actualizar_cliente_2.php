<?php
	

	ModificarCliente($_POST['nombre'], $_POST['barrio'], $_POST['telefono'], $_POST['telefonos'], $_POST['direccion'], $_POST['identificacion']);

	function ModificarCliente($nombre, $barrio, $telefono, $telefonos, $direccion, $identificacion)
	{
		include '../conexion/conexion.php';
		$sentencia="UPDATE cliente SET Nombre='".$nombre."', Barrio= '".$barrio."', Telefono1='".$telefono."', Telefono2='".$telefonos."', Direccion='".$direccion."' WHERE Id_Cliente='".$identificacion."' ";
		mysqli_query($conexion, $sentencia) or die (mysqli_error($conexion));
		mysqli_close($conexion);

	}
?>

<script type="text/javascript">
	
	window.location.href='../Lista_c.php';
</script>