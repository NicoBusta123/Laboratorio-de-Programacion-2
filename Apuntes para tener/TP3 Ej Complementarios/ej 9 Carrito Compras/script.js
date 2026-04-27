document.addEventListener("DOMContentLoaded",()=>{

    const producto1 = {nombre:"Monitor Gamer",precio:1000000,color:"Rojo"};

const producto2= {nombre:"Monitor feo",precio:50000,color:"Gris"};

const producto3 = {nombre:"Mouse cheto",precio:200000,color:"Blanco"};

let seccionProductos = document.getElementById('seccionProductos');

let vistaCarro = document.getElementById('carritoCompras');
let bodyCarro = document.querySelector("table tbody");


let listaProductos = [];

listaProductos.push(producto1);
listaProductos.push(producto2);
listaProductos.push(producto3);




let carritoCompras = [];


function cargoProductos(){
    for (let index = 0; index < listaProductos.length; index++) {
        const element = listaProductos[index];
        let nuevoDiv = document.createElement('div');
        let nombreProd = document.createElement('h3');
        nombreProd.textContent = element.nombre;
        let precioProd = document.createElement('h3');
        precioProd.textContent = element.precio;
        let botonAgregar= document.createElement('button');
        botonAgregar.textContent = "+";
        botonAgregar.setAttribute("data-accion","agregar");
        botonAgregar.setAttribute("data-index",index);
        //botonAgregar.onclick(agregarProducto());
        nuevoDiv.appendChild(nombreProd);
        nuevoDiv.appendChild(precioProd);
        nuevoDiv.appendChild(botonAgregar);
        nuevoDiv.classList.add('producto');

        seccionProductos.appendChild(nuevoDiv);

    }
}

cargoProductos();




seccionProductos.addEventListener('click',(e)=>{
    if (e.target.dataset.accion == 'agregar'){
        let indiceProducto = e.target.dataset.index;
        let productoSeleccionado = listaProductos[indiceProducto];
        carritoCompras.push(productoSeleccionado);
        

        //LOS PASO A LA SECCION DEL CARRO
        
            let fila = document.createElement('tr');
            let datoNombre = document.createElement('td');
            let datoPrecio = document.createElement('td');

            datoNombre.textContent = productoSeleccionado.nombre;
            datoPrecio.textContent = productoSeleccionado.precio;

            fila.appendChild(datoNombre);
            fila.appendChild(datoPrecio);

            bodyCarro.appendChild(fila);




        //     bodyCarro.innerHTML = `
        // <tr>
        //     <td>${element.nombre} </td>
        //     <td>${element.precio} </td>      
        // </tr>
        // `
        
       
    }
})





});
