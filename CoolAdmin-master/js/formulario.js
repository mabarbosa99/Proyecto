const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	identificacion: /^\d{7,10}$/, // 7 a 14 numeros.
	id: /^\d{0,1}$/, // 7 a 14 numeros.
	nombre:  /^[a-zA-Z0-9-a-zA-Z0-9\s]{4,36}$/, // Letras, numeros, guion y guion_bajo
	apellido: /^[a-zA-ZÀ-ÿ\s]{4,40}$/, // Letras y espacios, pueden llevar acentos.
	barrio: /^[a-zA-ZÀ-ÿ\s]{4,40}$/, // Letras y espacios, pueden llevar acentos.
	direccion: /^[a-zA-Z0-9-a-zA-Z0-9\s]{4,16}$/, // Letras, numeros, guion y guion_bajo
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,10}$/, // 7 a 14 numeros.
	tipo:  /^[a-zA-ZÀ-ÿ\s]{4,40}$/, // Letras y espacios, pueden llevar acentos.
	nombrep: /^[a-zA-Z0-9\s]{4,30}$/, // Letras y espacios, pueden llevar acentos.
	Volumen: /^[a-zA-Z0-9\s]{4,16}$/, // Letras, numeros, guion y guion_bajo
	precio: /^\d{3,20}$/, // 7 a 14 numeros.
	telefonos: /^\d{7,10}$/ // 7 a 14 numeros.
	

}

const campos = {
	identificacion: false,
	id: false,
	nombre: false,
	apellido: false,
	barrio: false,
	password: false,
	correo: false,
	telefono: false,
	direccion: false,
	tipo: false,
	nombrep: false,
	Volumen: false,
	precio: false,
	telefonos: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "identificacion":
			validarCampo(expresiones.identificacion, e.target, 'identificacion');
		break;
		case "id":
			validarCampo(expresiones.id, e.target, 'id');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "apellido":
			validarCampo(expresiones.apellido, e.target, 'apellido');
		break;
		case "barrio":
			validarCampo(expresiones.barrio, e.target, 'barrio');
		break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		case "direccion":
			validarCampo(expresiones.direccion, e.target, 'direccion');
		break;
		case "nombrep":
			validarCampo(expresiones.nombrep, e.target, 'nombrep');
		break;
		case "tipo":
			validarCampo(expresiones.tipo, e.target, 'tipo');
		break;
		case "precio":
			validarCampo(expresiones.precio, e.target, 'precio');
		break;
		case "Volumen":
			validarCampo(expresiones.Volumen, e.target, 'Volumen');
		break;
		case "telefonos":
			validarCampo(expresiones.telefonos, e.target, 'telefonos');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});


function registrar(){
	formulario.addEventListener('submit', (e) => {
		

		if(campos.identificacion && campos.nombre && campos.apellido && campos.telefono && campos.direccion && campos.correo ){
			
			$(getElementById('enviar')).on("click", function() {

				var identificacion = $(getElementById("identificacion")).val();
				var nombre = $(getElementById("nombre")).val();
				var apellido = $(getElementById("apellido")).val();
				var telefono = $(getElementById("telefono")).val();
				var direccion = $(getElementById("direccion")).val();
				var correo = $(getElementById("correo")).val();

				$.ajax({
					url: 'registrarSupervisor.php',
					type: 'post',
					data: {'identificacion':identificacion, 'nombre':nombre, 'apellido':apellido, 'telefono':telefono, 'direccion':direccion, 'correo':correo},
					dataType: 'json',
				});
		})
		} else {
			e.preventDefault();
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		}
	});
}

function editar(){
	formulario.addEventListener('submit', (e) => {
		

		if(campos.identificacion && campos.nombre && campos.apellido && campos.telefono && campos.direccion && campos.correo ){
			
			$(getElementById('enviar')).on("click", function() {

				var id = $(getElementById("id_supervisor")).val();
				var identificacion = $(getElementById("identificacion")).val();
				var nombre = $(getElementById("nombre")).val();
				var apellido = $(getElementById("apellido")).val();
				var telefono = $(getElementById("telefono")).val();
				var direccion = $(getElementById("direccion")).val();
				var correo = $(getElementById("correo")).val();

				$.ajax({
					url: 'funciones/Actualizar_2.php',
					type: 'post',
					data: {'id_supervisor':id, 'identificacion':identificacion, 'nombre':nombre, 'apellido':apellido, 'telefono':telefono, 'direccion':direccion, 'correo':correo},
					dataType: 'json',
				});
		})
		} else {
			e.preventDefault();
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		}
	});
}

function preguntarSiNoS(id){
	console.log(id);
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){eliminarDatos(id) }
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

function registrarProducto(){
	formulario.addEventListener('submit', (e) => {
		

		if(campos.nombre && campos.precio){
			
			$(getElementById('enviar')).on("click", function() {

				var tipo = $(getElementById("tipo")).val();
				var nombre = $(getElementById("nombre")).val();
				var precio = $(getElementById("precio")).val();
				var Volumen = $(getElementById("Volumen")).val();

				$.ajax({
					url: 'funciones_registrar_producto.php',
					type: 'post',
					data: {'tipo':tipo, 'nombre':nombre, 'precio':precio, 'Volumen':Volumen},
					dataType: 'json',
				});
		})
		} else {
			e.preventDefault();
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		}
	});
}

function editarProducto(){
	formulario.addEventListener('submit', (e) => {
		

		if(campos.nombre && campos.precio){
			
			$(getElementById('enviar')).on("click", function() {

				var id = $(getElementById("id")).val();
				var tipo = $(getElementById("tipo")).val();
				var nombre = $(getElementById("nombre")).val();
				var precio = $(getElementById("precio")).val();
				var Volumen = $(getElementById("Volumen")).val();

				$.ajax({
					url: 'funciones/Actualizar_producto2.php',
					type: 'post',
					data: {'id':id, 'tipo':tipo, 'nombre':nombre, 'precio':precio, 'Volumen':Volumen},
					dataType: 'json',
				});
		})
		} else {
			e.preventDefault();
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		}
	});
}

function preguntarSioNo(id){
	console.log(id);
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarProducto(id) }
					, function(){ alertify.error('Se cancelo')});
}

function eliminarProducto(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"funciones/Eliminar_producto.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('tablaProductos.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}
function editarDomiciliario(){
	formulario.addEventListener('submit', (e) => {
		

		if(campos.identificacion && campos.nombre && campos.apellido && campos.telefono && campos.direccion && campos.correo ){
			
			$(getElementById('enviar')).on("click", function() {

				var id_domiciliario = $(getElementById("id_domiciliario")).val();
				var identificacion = $(getElementById("identificacion")).val();
				var nombre = $(getElementById("nombre")).val();
				var apellido = $(getElementById("apellido")).val();
				var telefono = $(getElementById("telefono")).val();
				var direccion = $(getElementById("direccion")).val();
				var correo = $(getElementById("correo")).val();

				$.ajax({
					url: 'funciones/Actualizar_domiciliario_2.php',
					type: 'post',
					data: {'id_domiciliario':id_domiciliario, 'identificacion':identificacion, 'nombre':nombre, 'apellido':apellido, 'telefono':telefono, 'direccion':direccion, 'correo':correo},
					dataType: 'json',
				});
		})
		} else {
			e.preventDefault();
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		}
	});
}
function preguntarSiNoD(id){
	console.log(id);
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDomiciliario(id) }
					, function(){ alertify.error('Se cancelo')});
}

function eliminarDomiciliario(id){

	cadena="id_domiciliario=" + id;

		$.ajax({
			type:"POST",
			url:"funciones/Eliminar_domiciliario.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('tablaDomiciliario.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}
function editarEmpleado(){
	formulario.addEventListener('submit', (e) => {
		

		if(campos.identificacion && campos.nombre && campos.apellido && campos.telefono && campos.direccion && campos.correo ){
			
			$(getElementById('enviar')).on("click", function() {

				var id_empleado = $(getElementById("id_empleado")).val();
				var identificacion = $(getElementById("identificacion")).val();
				var nombre = $(getElementById("nombre")).val();
				var apellido = $(getElementById("apellido")).val();
				var telefono = $(getElementById("telefono")).val();
				var direccion = $(getElementById("direccion")).val();
				var correo = $(getElementById("correo")).val();

				$.ajax({
					url: 'funciones/Actualizar_empleado_2.php',
					type: 'post',
					data: {'id_empleado':id_empleado, 'identificacion':identificacion, 'nombre':nombre, 'apellido':apellido, 'telefono':telefono, 'direccion':direccion, 'correo':correo},
					dataType: 'json',
				});
		})
		} else {
			e.preventDefault();
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		}
	});
}
function preguntarSiNoE(id){
	console.log(id);
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarEmpleado(id) }
					, function(){ alertify.error('Se cancelo')});
}

function eliminarEmpleado(id){

	cadena="id_empleado=" + id;

		$.ajax({
			type:"POST",
			url:"funciones/Eliminar_empleado.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('tablaEmpleados.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}
function registrarCliente(){
	formulario.addEventListener('submit', (e) => {
		

		if(campos.identificacion && campos.nombre && campos.barrio && campos.telefono && campos.telefonos && campos.direccion ){
			
			$(getElementById('enviar')).on("click", function() {

				var identificacion = $(getElementById("identificacion")).val();
				var nombre = $(getElementById("nombre")).val();
				var barrio = $(getElementById("barrio")).val();
				var telefono = $(getElementById("telefono")).val();
				var telefonos = $(getElementById("telefonos")).val();
				var direccion = $(getElementById("direccion")).val();
				

				$.ajax({
					url: 'funciones/registrar_cliente.php',
					type: 'post',
					data: {'identificacion':identificacion, 'nombre':nombre, 'barrio':barrio, 'telefono':telefono, 'telefonos': telefonos, 'direccion':direccion},
					dataType: 'json',
				});
		})
		} else {
			e.preventDefault();
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		}
	});
}
function editarCliente(){
	formulario.addEventListener('submit', (e) => {
		

		if(campos.identificacion && campos.nombre && campos.barrio && campos.telefono && campos.telefonos && campos.direccion ){
			
			$(getElementById('enviar')).on("click", function() {

				var identificacion = $(getElementById("identificacion")).val();
				var nombre = $(getElementById("nombre")).val();
				var barrio = $(getElementById("barrio")).val();
				var telefono = $(getElementById("telefono")).val();
				var telefonos = $(getElementById("telefonos")).val();
				var direccion = $(getElementById("direccion")).val();

				$.ajax({
					url: 'funciones/Actualizar_cliente_2.php',
					type: 'post',
					data: {'identificacion':identificacion, 'nombre':nombre, 'barrio':barrio, 'telefono':telefono, 'telefonos':telefonos, 'direccion':direccion},
					dataType: 'json',
				});
		})
		} else {
			e.preventDefault();
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		}
	});
}
function preguntarSiNo(id){
	console.log(id);
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarCliente(id) }
					, function(){ alertify.error('Se cancelo')});
}

function eliminarCliente(id){

	cadena="Id_Cliente=" + id;

		$.ajax({
			type:"POST",
			url:"funciones/Eliminar_cliente.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('tablaClientes.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}