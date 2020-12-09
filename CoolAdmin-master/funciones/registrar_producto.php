<?php

$conexion = mysqli_connect("localhost", "root", "", "likor");

    $tipo = $_POST["tipo"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $volumen = $_POST["Volumen"];

    $insertar = "INSERT INTO producto(tipo_producto, nombre, precio, volumen) VALUES('$tipo', '$nombre', '$precio', '$volumen')";
    $ejecutar = mysqli_query($conexion, $insertar);

      if($ejecutar){

        echo "<script>window.location.href='../calendar.php'</script>";

      }

?>
