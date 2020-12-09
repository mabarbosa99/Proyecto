function validar(){
    var id, nombre, apellido, telefono, direccion, correo, usuario, contraseña, expresion;
    id = document.getElementById("Id_domiciliario").value; 
    nombre = document.getElementById("Nombre_domiciliario").value; 
    apellido = document.getElementById("Apellido_domiciliario").value; 
    telefono = document.getElementById("Telefono_domiciliario").value; 
    direccion = document.getElementById("Direccion_domiciliario").value; 
    correo = document.getElementById("Correo_domiciliario").value; 
    usuario = document.getElementById("Usuario").value; 
    contraseña = document.getElementById("Contraseña").value;
    expresion =/\w+@\w+\.+[a-z]/;
    
    if(id=== ""|| nombre === "" || apellido === "" || telefono === ""|| direccion === "" || correo === "" || usuario ==="" || contraseña ===""){
        alert("Todos los campos son obligatorios");
        return false
    }
    else if(id.length>10){
        alert("Número de Identificación incorrecto");
        return false
    }
    else if(isNaN(id)){
        alert("El número de teléfono no es número");
        return false
    }
    else if(nombre.length>50){
        alert("Los nombres no cumplen con la longitud de caracteres");
        return false
    }
    else if(apellido.length>50){
        alert("Los apellidos no cumplen con la longitud de caracteres");
        return false
    }
    else if(telefono.length>10){
        alert("El número de teléfono es incorrecto");
        return false
    }
    else if(isNaN(telefono)){
        alert("El número de teléfono no es número");
        return false
    }
    else if(direccion.length>50){
        alert("La dirección no cumple con la longitud de caracteres");
        return false
    }
    else if(correo.length>50){
        alert("El correo no cumple con la longitud de caracteres ");
        return false
    }
    else if(!expresion.test(correo)){
        alert("El correo no es valido");
        return false
    }
    else if(direccion.length>50){
        alert("La dirección no cumple con la longitud de caracteres");
        return false
    }
    else if(usuario.length>30){
        alert("El usuario no cumple con la longitud de caracteres");
        return false
    }
    
}