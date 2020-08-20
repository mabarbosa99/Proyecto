<?php
  $conexion=mysqli_connect('localhost', 'root', '', 'licorera') or die('Error en la conexion servidor');
  $sql="INSERT INTO usuarios VALUES('".$_POST["Identificación"]."','".$_POST["Nombres_Apellidos"]."', 
  '".$_POST["correo"]."', '".$_POST["direccion"]."', '".$_POST["telefono"]."','".$_POST["tipo_usuario"]."',
  '".$_POST["usuario"]."','".$_POST["clave"]."')";
  $resultado=mysqli_query($conexion, $sql) or die('Error en el query database');
  mysqli_close($conexion);

  if($sql=1){
      header("location: Formulario.html");
  }

  /*echo 'La Identificación del usuario ingresado es: '.$_POST["Identificación"];
  echo 'El nombre del usuario es: '.$_POST["Nombres_Apellidos"];
  echo 'El correo es: '.$_POST["correo"];
  echo 'La dirección es: '.$_POST["direccion"];
  echo 'El telefono es: '.$_POST["telefono"];
  echo 'El tipo de usuario es: '.$_POST["tipo_usuario"];
  echo 'El nombre de usuario es: '.$_POST["usuario"];
?>