function buscarProducto(){
    var nombreProducto = document.getElementById("nombreProducto").value.trim();
    var productos = document.getElementById("opcionesProductos");

    productos.innerHTML = "";
    
    var peticion = new XMLHttpRequest();

    peticion.open("GET", "get_productos.php?nombreProducto="+nombreProducto,true);

    peticion.onreadystatechange = function(){
        if (peticion.readyState === 4 && peticion.status === 200){
            var datos = JSON.parse(peticion.responseText);

            datos.forEach(producto => {
                var option = document.createElement("option");
                option.innerHTML = producto.descripcion;
                option.value = producto.nroProducto;
                productos.appendChild(option);
            });
        }

    }

    peticion.send(null);

}