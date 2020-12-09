<?php
      require '../conexion/conexion.php';
      if(isset($_POST['enviar'])){

      $conexion=mysqli_connect('localhost', 'root', '', 'likor') or die('Error en la conexion servidor');
      $sql = "INSERT INTO `empleado`(`Identificacion`, `Nombre`, `Apellido`, `Telefono`, `Correo_electronico`) 
      VALUES ('".$_POST['identificacion']."','".$_POST['nombre']."', '".$_POST['apellido']."',
      '".$_POST['telefono']."', '".$_POST['correo']."')";

      $resultado=mysqli_query($conexion, $sql) or die (mysqli_error($conexion));
      $cadena = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 11);
      $Contraseña = sha1($cadena);
      $sql = "INSERT INTO `usuarios`(`usuario`, `contraseña`, `FK_roles_id`, `FK_id_supervisor`) VALUES ('".$_POST['nombre']."', '$Contraseña', 3, 3)";

      $resultado=mysqli_query($conexion, $sql) or die (mysqli_error($conexion));

      }

      $result="";
        if(isset($_POST['enviar'])){
            require '../PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $mail->Username='licoresdelanochebogotasena@gmail.com';
            $mail->Password='Sena2020';

            $mail->setFrom($_POST['correo'],$_POST['nombre']);
            $mail->addAddress($_POST['correo'],$_POST['nombre']);
            $mail->addReplyTo($_POST['correo'],$_POST['nombre']);

            $mail->isHTML();
            $mail->Subject='Validacion de Usuario';
            $mail->Body='<h2 align=center>Gracias por trabajar con nosotros '.$_POST['nombre'].'<br>Podra entrar al sistema con su usuario:'.$_POST['nombre'].'<br>Y su  contraseña es: '
            .$cadena.'</h2>';

            if(!$mail->send()){
                $result="Algo esta mal, intentelo de nuevo por favor";
            }
            else{
                $result="Gracias".$_POST['nombre']."Por contactarnos";
            }
        }
  
?>
<script type="text/javascript">
	
	window.location.href='../Lista_e.php';
</script>