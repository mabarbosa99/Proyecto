function validar(){
    var id, tipo, nombre, precio, volumen;
    id = document.getElementById("Id_producto").value; 
    tipo = document.getElementById("Tipo_producto").value; 
    nombre = document.getElementById("Nombre_producto").value; 
    precio = document.getElementById("Precio_producto").value; 
    volumen = document.getElementById("Volumen_producto").value; 
    
    if(id=== ""|| tipo === "" || nombre === "" || precio === ""|| volumen === ""){
        alert("Todos los campos son obligatorios");
        return false
    }
    else if(id.length>11){
        alert("El codigo del producto es incorrecto");
        return false
    }
    else if(tipo.length>50){
        alert("El tipo de producto no cumple con la longitud de caracteres");
        return false
    }
    else if(nombre.length>50){
        alert("El nombre del producto no cumple con la longitud de caracteres");
        return false
    }
    else if(precio.length>11){
        alert("El precio del producto es incorrecto");
        return false
    }
    else if(isNaN(precio)){
        alert("El número del precio no es un número");
        return false
    }
    else if(volumen.length>20){
        alert("El Volumen del producto no cumple con la longitud de caracteres");
        return false
    }
    
    
}