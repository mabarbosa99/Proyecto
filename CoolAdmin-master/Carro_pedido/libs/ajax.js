

$(function(){
	var ENV_WEBROOT = "../";
	
	$(".btn-agregar-producto").off("click");
	$(".btn-agregar-producto").on("click", function(e) {
		var cantidad = $("#txt_cantidad").val();
		var producto_id = $("#cbo_producto").val();
		if(producto_id!=0){
			if(cantidad!=''){
				$.ajax({
					url: 'Controller/ProductoController.php?page=1',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							$("#txt_cantidad").val('');
							alertify.success(data.msj);
							$(".detalle-producto").load('detalle.php');
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
			}else{
				alertify.error('Ingrese una cantidad');
			}
		}else{
			alertify.error('Seleccione un producto');
		}
	});
	
	$(".eliminar-producto").off("click");
	$(".eliminar-producto").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: 'Controller/ProductoController.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-producto").load('detalle.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});

	$(".guardar-producto").off("click");
	$(".guardar-producto").on("click", function(e) {
		var Observaciones = $("#Observaciones").val();
		var Fechahora = $("#Fechahora").val();
		var Tipopago = $("#Tipopago").val();
		var IdClientes = $("#IdClientes").val();
		var Estado = 'Pendiente';
			$.ajax({
				url: 'Controller/ProductoController.php?page=3',
				type: 'POST',
				data:{'Observaciones':Observaciones, 'Fechahora':Fechahora, 'Tipopago':Tipopago, 'IdClientes': IdClientes, 'Estado':Estado},
				dataType: 'json',
				success: function(data) {
					if(data.success==true){
						$("#txt_cantidad").val('');
						alertify.success(data.msj);
						$(".detalle-producto").load('detalle.php');
						window.location.href='../Lista_p.php';
					}else{
						alertify.error(data.msj);
					}
				},
				
			});								
	});
	
});