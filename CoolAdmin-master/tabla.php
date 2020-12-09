<?php 
	session_start();
	require_once "conexion/conexion.php";

?>

<table id="id_de_la_tabla" class="display">
    <thead>
        <tr>
            <th>Pedido</th>
            <th>Cantidad</th>
        	<th>Observaciones</th>
            <th>Pago</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Realizar</th>
            <th>Terminar</th>
            <th>Devolucion</th>
        </tr>
    </thead>
    <tbody>
        <?php

            if(isset($_SESSION['consulta'])){
                if($_SESSION['consulta'] > 0){
                    $idp=$_SESSION['consulta'];
                    $sql="SELECT Id_Pedido, Pedido, cantidad, Observaciones, Tipo_pago, Total, Estado FROM pedido WHERE Id_Pedido='$idp'";
                }else{
                    $sql="SELECT Id_Pedido, Pedido, cantidad, Observaciones, Tipo_pago, Total, Estado FROM pedido";
                }
            }else{
                $sql="SELECT c.Id_Cliente, c.Nombre, c.Barrio, c.Telefono1, c.Telefono2, c.Direccion, p.Id_Pedido, p.Pedido, p.cantidad, p.Observaciones, p.Tipopago, p.Total, p.Estado FROM pedido AS p INNER JOIN cliente AS c ON p.Id_Cliente =c.Id_Cliente";
                $sql2 = "";
            }

            $resultado=mysqli_query($conexion, $sql);
            while($filas=mysqli_fetch_row($resultado)){ 

            	$datos=$filas[0]."||".
            			$filas[1]."||".
                		$filas[2]."||".
                		$filas[3]."||".
                        $filas[4]."||".
                        $filas[5]."||".
                        $filas[6]."||".
                        $filas[7]."||".
                        $filas[8]."||".
                        $filas[9]."||".
                        $filas[10]."||".
                        $filas[11]."||".
                        $filas[12];
        ?>
        <tr>
            <td><?php echo $filas[7]; ?></td>
            <td><?php echo $filas[8]; ?></td>
            <td><?php echo $filas[9]; ?></td>
            <td><?php echo $filas[10]; ?></td>
            <td><?php echo $filas[11]; ?></td>
            <td><span class="role admin"><?php echo $filas[12]; ?></span></td>
            <td><button id="boton" class="btn btn-success glyphicon glyphicon-ok" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform(`<?php echo $datos ?>`)"></button></td>
            <td><a href="funciones/terminarPedido.php?Id_Pedido=<?php echo $filas[6]; ?>&Pedido=<?php echo $filas[7] ?>&cantidad=<?php echo $filas[8] ?>&Observaciones=<?php echo $filas[9] ?>&Tipo_pago=<?php echo $filas[10] ?>&Total=<?php echo $filas[11] ?>&Estado=<?php echo $filas[12] ?>"><button class="btn btn-success glyphicon glyphicon-check"></button></a></td>
            <td><a href="funciones/devolucionPedido.php?Id_Pedido=<?php echo $filas[6]?>"><button type='button' class='btn btn-danger glyphicon glyphicon-remove'></button></a></td>
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