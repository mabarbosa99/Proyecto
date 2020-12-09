<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Empleados.xls');

?>


<table id="id_de_la_tabla">
    <thead>
        <tr>
            <th>Identificacion</th>
            <th>Nombre</th>
        	<th>Apellido</th>
            <th>Telefono</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php

        	include "../conexion/conexion.php";
            $sentencia="SELECT id_empleado, Identificacion, Nombre, Apellido, Telefono, Correo_electronico FROM empleado";
            $resultado=mysqli_query($conexion, $sentencia);
            while($filas=mysqli_fetch_row($resultado)){ 

            	$datos=$filas[0]."||".
            			$filas[1]."||".
                		$filas[2]."||".
                		$filas[3]."||".
                        $filas[4]."||".
                        $filas[5];
        ?>
        <tr>
            <td><?php echo $filas[1]; ?></td>
            <td><?php echo $filas[2]; ?></td>
            <td><?php echo $filas[3]; ?></td>
            <td><?php echo $filas[4]; ?></td>
            <td><?php echo $filas[5]; ?></td>
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

