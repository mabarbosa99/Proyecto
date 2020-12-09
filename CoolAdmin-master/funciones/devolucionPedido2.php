
<?php

$conexion = mysqli_connect("localhost", "root", "", "likor");

    $id = $_POST["Id_Pedido"];
    $asunto = $_POST["asunto"];

    $insertar = "INSERT INTO devolucion(Asunto, Fecha) VALUES('$asunto', now() )";
    $ejecutar = mysqli_query($conexion, $insertar);

    $insertar = "DELETE FROM pedido WHERE Id_Pedido='$id'";
    $ejecutar = mysqli_query($conexion, $insertar);
      if($ejecutar){

        echo "<script>window.location.href='../index4.php'</script>";

      }

?>