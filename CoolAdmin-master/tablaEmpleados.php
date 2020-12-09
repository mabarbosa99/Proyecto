<table id="id_de_la_tabla" >
    <thead>
        <tr>
            <th>Identificación</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Email</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $conexion=mysqli_connect('localhost', 'root', '', 'likor') or die('Error en la conexion servidor');
            $sentencia="SELECT id_empleado, Identificacion, Nombre, Apellido, Telefono, Direccion, Correo_electronico FROM empleado";
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
                    <td><a href="funciones/Actualizar_empleado.php?id_empleado=<?php echo $filas[0]?>"><button class="btn btn-primary glyphicon glyphicon-pencil"></button></a></td>
                    <td><button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNoE(`<?php echo $datos ?>`)"></button></td>
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