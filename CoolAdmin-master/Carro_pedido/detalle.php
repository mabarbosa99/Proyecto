<!DOCTYPE html>
<html>
<head>
	<title>Carrito</title>
</head>
<body>

</body>
</html>
<?php 
@session_start();
?>
<?php if(count($_SESSION['detalle'])>0){?>
	<br>
	<center>
	<table class="table">
	    <thead>
	        <tr>
	            <th>Descripci&oacute;n</th>
	            <th>Cantidad</th>
	            <th>Precio</th>
				<th>Subtotal</th>
				
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php 
	    	$total = 0;
	    	foreach($_SESSION['detalle'] as $k => $detalle){ 
			$total += $detalle['subtotal'];
	    	?>
	        <tr>
	        	<td><?php echo $detalle['producto'];?></td>
	            <td><?php echo $detalle['cantidad'];?></td>
	            <td><?php echo $detalle['precio'];?></td>
				<td><?php echo $detalle['subtotal'];?></td>
	            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
	        </tr>
	        <?php }?>
	        <tr>
	        	<td colspan="3" class="text-right">Total</td>
	        	<td><?php echo $total;?></td>
	        	<td></td>
	        </tr>
	    </tbody>
	</table>
</center>
<?php }else{?>
	<br>
	<br>
	<center>
<div class="panel-body"><font size="4" color="" > No hay productos agregados</font></div>
<br>
<a href="index.php">
			
</a>
    </center>			
<?php }?>

<script type="text/javascript" src="libs/ajax.js"></script>