<?php
     require '../conexion/conexion.php';
     if(isset($_POST['Devolver'])){
            $conexion=mysqli_connect('localhost', 'root', '', 'likor') or die('Error en la conexion servidor');
            $sql="INSERT INTO `devolucion`(`Asunto`, `FK_Id_Pedido`, `Id_Cliente`) VALUES ('".$_POST['Asunto']."','".$_POST['FK_Id_Pedido']."','".$_POST['Id_Cliente']."')";
            $resultado=mysqli_query($conexion, $sql) or die('Error  database');

            $id_pedido=$_POST['FK_Id_Pedido'];

	     $sql="DELETE FROM pedido WHERE Id_Pedido='$id_pedido'";
	     echo $result=mysqli_query($conexion,$sql);
                  
     }
     
?>
<script type="text/javascript">
	
	window.location.href='../Lista_de.php';
</script>