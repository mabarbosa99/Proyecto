<?php
	

	ModificarSupervisor($_POST['identificacion'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['direccion'], $_POST['correo'], $_POST['id_supervisor']);

	function ModificarSupervisor($identificacion, $nombre, $apellido, $telefono, $direccion, $correo, $id)
	{
		include '../conexion/conexion.php';
		$sentencia="UPDATE supervisor SET Identificacion='".$identificacion."', Nombre= '".$nombre."', 
		Apellido='".$apellido."', Telefono='".$telefono."', Direccion='".$direccion."', Correo_electronico='".$correo."' 
		WHERE id_supervisor='".$id."' ";
		mysqli_query($conexion, $sentencia) or die (mysqli_error($sentencia));
	}
?>

<script type="text/javascript">
	
	window.location.href='../table.php';
</script>
