<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Supervisores.xls');

?>

<table id="id_de_la_tabla" >
    <thead>
        <tr>
            <th>Identificación</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "../conexion/conexion.php";
            $sentencia="SELECT id_supervisor, Identificacion, Nombre, Apellido, Telefono, Direccion, Correo_electronico FROM supervisor";
            $resultado=mysqli_query($conexion, $sentencia);
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