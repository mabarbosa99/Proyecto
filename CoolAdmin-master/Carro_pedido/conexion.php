<?php
$manejador="mysql";
$servidor="localhost";
$usuario="root";
$pass="";
$base="likor";
$cadena="$manejador:host=$servidor;dbname=$base";
$cnx = new PDO($cadena,$usuario,$pass);
?>