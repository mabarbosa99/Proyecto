<?php 
	session_start();
	require_once "conexion/conexion.php";

 ?>
<table id="id_de_la_tabla" class="display">
    <thead>
        <tr>
            <th>Pedido</th>
            <th>Cantidad</th>
            <th>Pago</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php

            if(isset($_SESSION['consulta'])){
                if($_SESSION['consulta'] > 0){
                    $idp=$_SESSION['consulta'];
                    $sql="SELECT id, pedido, cantidad, tipo_pago, total, estado, fecha FROM pedidos_ter";
                }else{
                    $sql="SELECT id, pedido, cantidad, tipo_pago, total, estado, fecha FROM pedidos_ter ";
                }
            }else{
                $sql="SELECT id, pedido, cantidad, tipo_pago, total, estado, fecha FROM pedidos_ter ";
            }

            $resultado=mysqli_query($conexion, $sql);
            while($filas=mysqli_fetch_row($resultado)){ 

            	$datos=$filas[0]."||".
            			$filas[1]."||".
                		$filas[2]."||".
                		$filas[3]."||".
                        $filas[4]."||".
                        $filas[5]."||".
                        $filas[6];
                        
        ?>
        <tr>
            <td><?php echo $filas[1]; ?></td>
            <td><?php echo $filas[2]; ?></td>
            <td><?php echo $filas[3]; ?></td>
            <td><?php echo $filas[4]; ?></td>
            <td><?php echo $filas[5]; ?></td>
            <td><?php echo $filas[6]; ?></td>

        </tr>
                            
        
        <?php 
		} 
		?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready( function () {
    $('#id_de_la_tabla').DataTable();
    
});
</script>