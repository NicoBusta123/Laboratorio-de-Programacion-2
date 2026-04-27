let mensaje = document.getElementById('mensaje');
let numeroRandom = Math.floor(Math.random() * 2);
let mensajeIntentos = document.getElementById('cantidadIntentos');
let cantidadIntentos = 0;
let nombreUsuario = leerCookieNombre();
let elementoMensaje = document.getElementById('mensajeNombre');

if (nombreUsuario && elementoMensaje){
    elementoMensaje.innerHTML = "Hola: "+nombreUsuario;
}




function adivinar(){
    let numeroIngresado = parseInt(document.getElementById('idNumero').value.trim());
    if (numeroIngresado !== ""){
        if(numeroIngresado === numeroRandom){
            mensaje.textContent = `Haz adivinado el numero! `;
            cantidadGanadas = parseInt(localStorage.getItem(`cantidadGanadas${nombreUsuario}`)) || 0;
            cantidadGanadas = cantidadGanadas+1;
            localStorage.setItem(`cantidadGanadas${nombreUsuario}`, cantidadGanadas);
            document.getElementById('mensajeCantidadGanadas').innerHTML = "En total haz ganado"+cantidadGanadas+" partidas";
            document.getElementById('botonReiniciar').classList.remove('oculto');
            document.getElementById('botonAdivinar').disabled = true;
        }else{
            cantidadIntentos = cantidadIntentos+1;
            mensajeIntentos.textContent = `La cantidad de intentos es: ${cantidadIntentos}`;
        }
    }
}


function comenzarJuego(){
    let nombreInput = document.getElementById('NombreUsuario').value.trim();
    document.cookie = `nombre=${nombreInput};path=/;max-age=3600`;
    window.location.href = "index2.html";
    
}

function leerCookieNombre(){
    let nombreUsuario = document.cookie.split(";").find((row) => row.startsWith("nombre="))?.split("=")[1];
    return nombreUsuario;
}

function reiniciarJuego(){
    numeroRandom = Math.floor(Math.random() * 2);
    
    // 2. Limpiamos textos e inputs
    cantidadIntentos = 0;
    document.getElementById('mensaje').textContent = "";
    document.getElementById('cantidadIntentos').textContent = "";
    document.getElementById('idNumero').value = "";
    document.getElementById('mensajeCantidadGanadas').textContent = "";
    
    // 3. Volvemos a esconder el botón y habilitar el de adivinar
    document.getElementById('botonReiniciar').classList.add('oculto');
    document.getElementById('botonAdivinar').disabled = false;
}




