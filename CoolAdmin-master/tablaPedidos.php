<table id="id_de_la_tabla" class="stripe" style="width:20%" >
    <thead>
        <tr>
            <th>Id</th>
            <th>Pedio</th>
            <th>Cantidad</th>
            <th>Observaciones</th>
            <th>Fecha y hora</th>
            <th>Tipo pago</th>
            <th>Total</th>
            <th>Identificación del Cliente</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $conexion=mysqli_connect('localhost', 'root', '', 'likor') or die('Error en la conexion servidor');
            $sentencia="SELECT Id_Pedido, Pedido, cantidad, Observaciones, Fechahora, Tipopago, Total, Id_Cliente FROM pedido";
            $resultado=mysqli_query($conexion, $sentencia);
            while($filas=mysqli_fetch_row($resultado)){

                $datos=$filas[0]."||".
                        $filas[1]."||".
                        $filas[2]."||".
                        $filas[3]."||".
                        $filas[4]."||".
                        $filas[5]."||".
                        $filas[6]."||".
                        $filas[7];
        ?>
                <tr>
                    <td><?php echo $filas[0]; ?></td>
                    <td><?php echo $filas[1]; ?></td>
                    <td><?php echo $filas[2]; ?></td>
                    <td><?php echo $filas[3]; ?></td>
                    <td><?php echo $filas[4]; ?></td>
                    <td><?php echo $filas[5]; ?></td>
                    <td><?php echo $filas[6]; ?></td>
                    <td><?php echo $filas[7]; ?></td>
                    <td><a href="funciones/Actualizar_pedido.php?Id_Pedido=<?php echo $filas[0]?>"><button class="btn btn-primary glyphicon glyphicon-pencil"></button></a></td>
                    <td><a href="funciones/devolucion_pedido.php?Id_Pedido=<?php echo $filas[0]?>"><button class="btn btn-danger glyphicon glyphicon-remove"></button></a></td>
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