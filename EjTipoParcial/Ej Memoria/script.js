

let numeros = [1,1,2,2,3,3,4,4,5,5,6,6];

//Hago esto, ya que al usar splice, el arreglo original numeros lo voy modificando
// y necesito comparar la cantidad de aciertos con el total original xd
let totalNumeros = numeros.length;


const contenedor = document.getElementById('contenedorCartas');

let numerosClickeados = 0;


let cantidadAdivinadas = [];

let form = document.getElementById('form');

form.addEventListener('submit', (event)=>{
    event.preventDefault();
    ingresar();
})



while(numeros.length > 0){
    
    //Me da un indice aleatorio entre la longitud de el arreglo
    const indiceAleatorio = Math.floor(Math.random() * numeros.length);
    
    //De ese arreglo, extraigo de la posicion aleatorio, 1 elemento. Pero como splice me devuelve un arreglo
    //con la cantidad de elementos extraidos, con el [0] digo que directamente me de el elemento de la posicion 0
    //y como es un solo elemento ya me da el numero
    const numero = numeros.splice(indiceAleatorio,1)[0];

    //Creo la carta
    let carta = document.createElement('div');
    carta.classList.add('carta');
    carta.textContent = numero;
    carta.dataset.numero = numero;
    carta.classList.add('contenidoOculto');
    carta.classList.add('clickeable');
    carta.addEventListener('click', () => {
        // 1. Si ya está acertada o ya es la que clickeamos antes, no hacer nada
        if (carta.classList.contains('cartaAcertada') || carta.classList.contains('revelada')) {
            return;
        }

        // 2. Mostramos la carta actual
        carta.classList.add('revelada'); 
        carta.classList.remove('contenidoOculto');
        numerosClickeados++;

        if (numerosClickeados === 2) {
            // 3. Buscamos las DOS que tienen la clase 'revelada'
            let cartasDadasVuelta = document.querySelectorAll('.revelada');
            let primerCarta = cartasDadasVuelta[0];
            let segundaCarta = cartasDadasVuelta[1];

            if (primerCarta.dataset.numero === segundaCarta.dataset.numero) {
                // ¡COINCIDEN!
                primerCarta.classList.add('cartaAcertada');
                segundaCarta.classList.add('cartaAcertada');
                // Les quitamos 'revelada' para que no interfieran con el próximo turno
                primerCarta.classList.remove('revelada');
                segundaCarta.classList.remove('revelada');
                numerosClickeados = 0; // RECIÉN ACÁ RESETEAMOS
                cantidadAdivinadas.push(primerCarta.dataset.numero);
                cantidadAdivinadas.push(segundaCarta.dataset.numero);
                verificarGanador();
            } else {
                // NO COINCIDEN. Usamos un pequeño delay para que el usuario las vea
                setTimeout(() => {
                    cartasDadasVuelta.forEach(c => {
                        c.classList.add('contenidoOculto');
                        c.classList.remove('revelada');
                    });
                    numerosClickeados = 0; // RESETEAMOS DESPUÉS DEL TIEMPO
                }, 1000);
            }
            //SI NO QUISIERA USAR EL TIEMPO, SACO EL TIMEOUT Y PONGO LO OTRO ASI
        }
        // IMPORTANTE: NO resetees numerosClickeados acá afuera.
    });
    contenedor.appendChild(carta);


}

function ingresar(){
    let inicioSesion = document.getElementById('inicioSesion');
    inicioSesion.classList.add('juego');
    let juego = document.getElementById('juego');
    juego.classList.remove('juego');

    let nombreUsuario = document.getElementById('usuario').value.trim();
    document.cookie = `usuario=${nombreUsuario}`+"; max-age=3000000; path=/";

    let mensajeNombre = document.getElementById('mensajeUsuario').textContent="Bienvenido "+ nombreUsuario+"!!";
}

function getCookie(nombre) {
    let nombreBusqueda = nombre + "=";
    let cookiesSeparadas = document.cookie.split(';');
    
    for (let i = 0; i < cookiesSeparadas.length; i++) {
        let c = cookiesSeparadas[i].trim();
        if (c.indexOf(nombreBusqueda) === 0) {
            return c.substring(nombreBusqueda.length, c.length);
        }
    }
    return null;
}

function verificarGanador(){
    if (cantidadAdivinadas.length === totalNumeros){
        let juego = document.getElementById('juego');
        juego.classList.add('juego');
        let cantidadGanadas = parseInt(getCookie("cantidadGanadas")) || 0;
        cantidadGanadas++;
        document.cookie = `cantidadGanadas=${cantidadGanadas}`+"; max-age=3000000; path=/";
        console.log(getCookie("cantidadGanadas"));
        document.getElementById('mensajeGanador').textContent = "Haz ganado un total de "+cantidadGanadas+" partidas!";


    }
}









