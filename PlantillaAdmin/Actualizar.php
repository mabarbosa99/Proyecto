<?php
     //$conexion=mysqli_connect('localhost', 'root', '', 'licorera') or die('Error en la conexion servidor');
     //$sql="SELECT * FROM usuarios WHERE Identificación='".$_GET["Identificación"]."'";
     //$resultado=mysqli_query($conexion, $sql) or die('Error en el query database');

     //while($fila=mysqli_fetch_assoc($resultado)){
        //<?php }?>
     
     
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <title>Formulario de actualización</title>
    <link rel="stylesheet" href="cssActualizar.css">
</head>
<body>
    <h1>Actualizar</h1>
    <form action="registrar.php" method="POST" class="form-register">
    <h2 class="form__titulo">Actualizar Información</h2>
    <div class="contededor-inputs">
        <input type="hidden" name="txtid" >
        <input type="text" name="Identificación" placeholder="Identificación" class="input-48" requiredvalue=>
        <input type="text" name="Nombres_Apellidos" placeholder="Nombres y Apellidos" class="input-48" requiredvalue=>
        <input type="email" name="correo" placeholder="correo" class="input-48"required value=>
        <input type="" name="direccion" placeholder="Dirección" class="input-48"required value=>
        <input type="text" name="telefono" placeholder="Telefono"class="input-48"required value=> 
        <select name="tipo_usuario" class="select-48" >
            <option>--Seleccione--</option> 
            <option>Gerente</option>
            <option>Supervisor</option>
            <option>Domiciliario</option>
            <option>Empleado</option>
        </select>
        <input type="text" name="usuario" placeholder="Nombre de usuario" class="input-48">
        <input type="password" name="clave" placeholder="Contraseña" class="input-48">
        <input type="submit" name="enviar" value="Modificar" class="btn-enviar">
        
    </div>
</form>
    
</body>
</html>