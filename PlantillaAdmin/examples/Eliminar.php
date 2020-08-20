<?php
         $conexion=mysqli_connect('localhost', 'root', '', 'licorera') or die('Error en la conexion servidor');

        if(isset($_GET['Identificación'])){
            $id= $_GET['Identificación'];
            $query = "DELETE FROM usuarios WHERE Identificación = $id";
            $resultado=mysqli_query($conexion, $query);
            if(!$resultado){

                die("Query fail");
            }
            header("location: dashboard.php");
        }
?>