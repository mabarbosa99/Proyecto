<table id="id_de_la_tabla" >
    <thead>
        <tr>
            <th>Identificación</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Pedido</th>
            <th>Cantidad</th>
            <th>Observaciones</th>
            <th>Fecha y hora</th>
            <th>Tipo de pago</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $conexion=mysqli_connect('localhost', 'root', '', 'likor') or die('Error en la conexion servidor');
            $sentencia="SELECT c.Id_Cliente, c.Nombre, c.Barrio, c.Telefono1, c.Telefono2, c.Direccion, 
            p.Pedido, p.cantidad, p.Observaciones, p.Fechahora, p.Tipopago, p.Total FROM pedido
            AS p INNER JOIN cliente AS c ON p.Id_Cliente=c.Id_Cliente WHERE p.Id_Cliente=65329075";
            $resultado=mysqli_query($conexion, $sentencia);
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
                        $filas[11];
        ?>
                <tr>
                    <td><?php echo $filas[1]; ?></td>
                    <td><?php echo $filas[2]; ?></td>
                    <td><?php echo $filas[3]; ?></td>
                    <td><?php echo $filas[4]; ?></td>
                    <td><?php echo $filas[5]; ?></td>
                    <td><?php echo $filas[6]; ?></td>
                    <td><?php echo $filas[7]; ?></td>
                    <td><?php echo $filas[8]; ?></td>
                    <td><?php echo $filas[9]; ?></td>
                    <td><?php echo $filas[10]; ?></td>
                    <td><?php echo $filas[11]; ?></td>
                    <td><a href="funciones/Actualizar_domiciliario.php?id_domiciliario=<?php echo $filas[0]?>"><button class="btn btn-primary glyphicon glyphicon-pencil"></button></a></td>
                    <td><button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo(`<?php echo $datos ?>`)"></button></td>
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