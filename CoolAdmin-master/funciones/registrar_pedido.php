<?php
      include '../conexion/conexion.php';

      $sql="INSERT INTO pedido(Pedido, cantidad, Observaciones, Hora, Fecha, Tipo_pago, Total)
       VALUES('".$_POST["Pedido"]."','".$_POST["cantidad"]."','".$_POST["Observaciones"]."', 
      '".$_POST["Hora"]."','".$_POST["Fecha"]."','".$_POST["Tipo_Pago"]."', '".$_POST["Total"]."')";
      $resultado=mysqli_query($conexion, $sql) or die('Error en el query database');
      mysqli_close($conexion);
    
      
?>
<script type="text/javascript">
	
	window.location.href='../Lista_p.php';
</script>