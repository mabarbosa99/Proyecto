<?php
    require '../conexion/conexion.php';
    
	if(isset($_GET['Id_Pedido'])){
		$Id_Pedido = $_GET['Id_Pedido'];
		$pedido = $_GET['Pedido'];
		$cantidad = $_GET['cantidad'];
		$observaciones = $_GET['Observaciones'];
		$tipo_pago = $_GET['Tipo_pago'];
		$total = $_GET['Total'];
		$estado = $_GET['Estado'];

		$sql="UPDATE pedido set Estado = 'Terminado' where Id_Pedido='$Id_Pedido'";
		$result = mysqli_query($conexion, $sql);

		$sql="INSERT INTO pedidos_ter(pedido, cantidad, observaciones, tipo_pago, total, estado, fecha) VALUES ('$pedido', '$cantidad', '$observaciones', '$tipo_pago', '$total' , 'Terminado', now())";
		$result = mysqli_query($conexion, $sql);

		$sql="DELETE FROM pedido WHERE Id_pedido='$Id_Pedido' ";
		$result = mysqli_query($conexion, $sql);

		if(!$result){
			echo '(<script>alert("fallo")</script>)';
		}
	}
?>

<script type="text/javascript">
	
	window.location.href='../terminados.php';
	
</script>