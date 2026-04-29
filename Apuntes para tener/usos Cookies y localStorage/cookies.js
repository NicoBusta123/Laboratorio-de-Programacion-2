//TANTO EN COOKIE Y LOCALSTORAGE, SE GUARDAN EN FORMATO DE STRING
//POR LO TANTO, DEBEMOS CONVERTIR UN OBJETO EN STRING PARA GUARDARLO
//Y LUEGO, PARA UTILIZARLO, UTILIZAMOS PARSE PARA CONVERTIRLO OTRA VEZ EN OBJETO


//LAS COOKIES, AL VIAJAR POR INTERNET, NO SE RECOMIENDA GUARDAR "OBJETOS" YA QUE PUEDE HACER QUE
//LAS PAGINAS SEAN MAS LENTAS, PERO SE PUEDE UTILIZAR EL MISMO TRUCO DE STRINGIFY PARA HACERLO.
//ADEMAS TIENEN MENOS ESPACIO QUE EN EL LOCALSTORAGE.

let config = { tema: "oscuro", volumen: 80 };
let objetoEnTexto = JSON.stringify(config);

// Guardamos codificando los caracteres especiales
document.cookie = "preferencias=" + encodeURIComponent(objetoEnTexto) + ";path=/";






//FUNCION PARA SETEAR COOKIE BIEN CHUPETE
function setCookie(nombre, valor) {
    // max-age=31536000 equivale a 1 año aproximadamente
    document.cookie = nombre + "=" + valor + "; max-age=31536000; path=/";
    console.log("Cookie guardada.");
}

// Ejemplo de uso:
setCookie("idioma", "es-AR", 30); // Dura un mes


//Obtengo el valor de la cookie
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

// Ejemplo de uso:
const miUsuario = getCookie("usuario");
if (miUsuario) {
    console.log("Bienvenido de nuevo, " + miUsuario);
} else {
    console.log("No hay sesión activa.");
}


function borrarCookie(nombre) {
    // Le ponemos max-age=0 y listo, el navegador la elimina al instante
    document.cookie = `${nombre}=; max-age=0; path=/`;
}

// Uso:
borrarCookie("usuario");