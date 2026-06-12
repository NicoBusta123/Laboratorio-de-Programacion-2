var productos = document.getElementById("opcionesProductos");
var seccionComprar = document.getElementById("seccionComprar");
var listaProductos = [];


function buscarProducto(){
    var nombreProducto = document.getElementById("nombreProducto").value.trim();

    productos.innerHTML = "";
    
    var peticion = new XMLHttpRequest();

    peticion.open("GET", "get_productos.php?nombreProducto="+nombreProducto,true);


    peticion.onreadystatechange = function(){
        if (peticion.readyState === 4 && peticion.status === 200){
            var datos = JSON.parse(peticion.responseText);
            listaProductos = datos;

            datos.forEach(producto => {
                var option = document.createElement("option");
                option.innerHTML = producto.descripcion;
                option.value = producto.nroProducto;
                productos.appendChild(option);
            });

            mostrarDetalles();


        }
    }




    peticion.send(null);

}

function mostrarDetalles(){

    var idSeleccionado = productos.value;

    var tituloPrecio = document.getElementById("precioProducto");
    var tituloStock = document.getElementById("stockProducto");

    var productoElegido = listaProductos.find(p=> p.nroProducto === idSeleccionado);

    if(productoElegido){
        var precio = productoElegido.precio;
        var stock = productoElegido.stock;

        tituloPrecio.innerHTML = "El precio del producto es: "+precio;
        tituloStock.innerHTML = "El stock del producto es: "+stock;
        mostrarSeccionComprar();
        mostrarTotal();
    }else{
        tituloPrecio.innerHTML = "";
        tituloStock.innerHTML = "";
        ocultarSeccionComprar();
    }
}

function mostrarSeccionComprar(){
    seccionComprar.classList.remove("hidden");
}

function ocultarSeccionComprar(){
    seccionComprar.classList.add("hidden");
}



function mostrarTotal(){
    var cantidad = document.getElementById("cantidad").value.trim();
    var mensajeImporte = document.getElementById("importeTotal");
    var idSeleccionado = productos.value;
    var total = 0;
    var productoElegido = listaProductos.find(p=> p.nroProducto === idSeleccionado);

    total = cantidad * productoElegido.precio;

    mensajeImporte.innerHTML = "El importe total seria de: "+total;


}




