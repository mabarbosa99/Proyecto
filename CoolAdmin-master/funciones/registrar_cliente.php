<?php
  include '../conexion/conexion.php';

  $sql="INSERT INTO cliente VALUES('".$_POST["identificacion"]."','".$_POST["nombre"]."', 
  '".$_POST["barrio"]."', '".$_POST["telefono"]."','".$_POST["telefonos"]."', '".$_POST["direccion"]."')";
  $resultado=mysqli_query($conexion, $sql) or die('Error en el query database');
  mysqli_close($conexion);


?>
<script type="text/javascript">
	window.location.href='../Lista_c.php';
</script>