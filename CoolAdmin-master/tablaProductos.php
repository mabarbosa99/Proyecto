<table id="id_de_la_tabla" >
    <thead>
        <tr>
            <th>Id</th>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Volumen</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "conexion/conexion.php";
            $sentencia="SELECT id, tipo_producto, nombre, precio, volumen FROM producto";
            $resultado=mysqli_query($conexion, $sentencia);
            while($filas=mysqli_fetch_row($resultado)){

                $datos=$filas[0]."||".
                        $filas[1]."||".
                        $filas[2]."||".
                        $filas[3]."||".
                        $filas[4];
        ?>
                <tr>
                    <td><?php echo $filas[0]; ?></td>
                    <td><?php echo $filas[1]; ?></td>
                    <td><?php echo $filas[2]; ?></td>
                    <td><?php echo $filas[3]; ?></td>
                    <td><?php echo $filas[4]; ?></td>
                    <td><a href="funciones/Actualizar_producto.php?id=<?php echo $filas[0]?>"><button class="btn btn-primary glyphicon glyphicon-pencil"></button></a></td>
                    <td><button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSioNo(`<?php echo $datos ?>`)"></button></td>
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