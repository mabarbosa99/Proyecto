function validar(){
    var id, nombre, barrio, telefono1, telefono2, direccion;
    id = document.getElementById("Id_cliente").value; 
    nombre = document.getElementById("Nombre_cliente").value; 
    barrio = document.getElementById("Barrio_cliente").value; 
    telefono1 = document.getElementById("Telefono1").value; 
    telefono2 = document.getElementById("Telefono2").value; 
    direccion = document.getElementById("Dirección").value; 
    
    
    if(id=== ""|| nombre === "" || barrio === "" || telefono1 === ""|| telefono2 === "" || direccion === ""){
        alert("Todos los campos son obligatorios");
        return false
    }
    else if(id.length>11){
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
    else if(barrio.length>30){
        alert("Los apellidos no cumplen con la longitud de caracteres");
        return false
    }
    else if(telefono1.length>10){
        alert("El primer número de teléfono es muy largo");
        return false
    }
    else if(isNaN(telefono1)){
        alert("El primer número de teléfono no es número");
        return false
    }
    else if(telefono2.length>10){
        alert("El segundo número de teléfono es muy largo");
        return false
    }
    else if(isNaN(telefono2)){
        alert("El segundo número de teléfono no es número");
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
}