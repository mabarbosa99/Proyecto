
function agregaform(datos){

    

	d=datos.split('||');

	$('#Id_cliente').val(d[0]);
	$('#Nombre').val(d[1]);
	$('#barrio').val(d[2]);
	$('#telefono1').val(d[3]);
	$('#telefono2').val(d[4]);
	$('#Direccion').val(d[5]);
	$('#Id_Pedido').val(d[6]);
	$('#Pedido').val(d[7]);
	$('#cantidad').val(d[8]);
	$('#Observaciones').val(d[9]);
    $('#Tipo_pago').val(d[10]);
    $('#Total').val(d[11]);
    $('#Estado').val(d[12]);
    
    
}
function actualizaDatos(){

    
	Id_Pedido=$('#Id_Pedido').val();


	cadena= "Id_Pedido=" + Id_Pedido;

	$.ajax({
		type:"POST",
		url:"funciones/Estado.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
                $('#tabla').load('tabla.php');
                alertify.success("Pedido en proceso");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	console.log(id);
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
					, function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id_supervisor=" + id;

		$.ajax({
			type:"POST",
			url:"funciones/Eliminar.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('tablaSupervisores.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}