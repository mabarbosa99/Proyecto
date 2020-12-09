function validar(){
    var id, nombre, apellido, telefono, direccion, correo, usuario, contraseña, expresion;
    id = document.getElementById("Id_supervisor").value; 
    nombre = document.getElementById("Nombre_supervisor").value; 
    apellido = document.getElementById("Apellido_supervisor").value; 
    telefono = document.getElementById("Telefono_supervisor").value; 
    direccion = document.getElementById("Direccion_supervisor").value; 
    correo = document.getElementById("Correo_supervisor").value; 
    usuario = document.getElementById("Usuario_supervisor").value; 
    contraseña = document.getElementById("Contraseña_supervisor").value;
    expresion =/\w+@\w+\.+[a-z]/;
    
    if(id=== ""|| nombre === "" || apellido === "" || telefono === ""|| direccion === "" || correo === "" || usuario ==="" || contraseña ===""){
        alert("Todos los campos son obligatorios");
        return false
    }
    else if(id.length>10){
        alert("El número de Identificación es muy largo");
        return false
    }
    else if(isNaN(id)){
        alert("El número de Identificación no es número");
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