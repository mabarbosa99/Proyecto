<?php

class Producto
{
	function get(){
		$sql = "SELECT * FROM producto";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getById($id){
		$sql = "SELECT * FROM producto WHERE id=$id";
		global $cnx;
		return $cnx->query($sql);
	}

	function guardar($Pedido, $cantidad, $Observaciones,  $Fechahora, $Tipopago, $Total, $Estado, $IdClientes){
		$sql = "INSERT INTO pedido(Pedido, cantidad, Observaciones,  Fechahora, Tipopago, Total, Estado, Id_Cliente) 
		VALUES('$Pedido', '$cantidad', '$Observaciones',  '$Fechahora', '$Tipopago', '$Total', '$Estado', '$IdClientes')";
		global $cnx;
		return $cnx->query($sql);
	}
}