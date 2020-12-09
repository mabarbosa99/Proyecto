<?php

session_start();
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0; 
}

require "../conexion.php";
require "../Producto.php";



switch($page){

	case 1:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
	
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				
				$resultado_producto = $objProducto->getById($producto_id);
				$producto = $resultado_producto->fetchObject();
				$nombre = $producto->nombre;
				$precio = $producto->precio;
				
				$subtotal = $cantidad * $precio;
				
				$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'producto'=>$nombre, 'cantidad'=>$cantidad, 'precio'=>$precio, 'subtotal'=>$subtotal);

				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese un producto y/o ingrese cantidad';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 2:
		$json = array();
		$json['msj'] = 'Producto Eliminado';
		$json['success'] = true;
	
		if (isset($_POST['id'])) {
			try {
				unset($_SESSION['detalle'][$_POST['id']]);
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;

		case 3:
			$objProducto = new Producto();
			$json = array();
			$json['msj'] = 'Registrado exitosamente';
			$json['success'] = true;
			
			if (count($_SESSION['detalle'])>0) {
				try {
					foreach($_SESSION['detalle'] as $detalle):
						$Observaciones = $_POST['Observaciones'];
						$Fechahora = $_POST['Fechahora'];
						$Tipopago = $_POST['Tipopago'];
						$IdClientes = $_POST['IdClientes'];
						$Estado = $_POST['Estado'];
						$Pedido = $detalle['producto'];
						$cantidad = $detalle['cantidad'];
						$Total = $detalle['subtotal'];
					endforeach;
					$objProducto->guardar($Pedido, $cantidad, $Observaciones, $Fechahora, $Tipopago, $Total, $Estado, $IdClientes);
					$json['success'] = true;
	
					echo json_encode($json);
		
				} catch (PDOException $e) {
					$json['msj'] = $e->getMessage();
					$json['success'] = false;
					echo json_encode($json);
				}
			}else{
				$json['msj'] = 'No hay productos agregados';
				$json['success'] = false;
				echo json_encode($json);
			}
			break;

}
?>
