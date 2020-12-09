<?php
    require 'conexion/conexion.php';
    session_start();
    session_destroy();
    header("location:login.php");
?>