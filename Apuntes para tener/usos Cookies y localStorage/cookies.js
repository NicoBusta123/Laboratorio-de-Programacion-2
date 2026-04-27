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




//ALGO ASI PUEDE SER CREAR UNA COOKIE BIEN CHUPETE!
function crearCookie(nombre, valor, dias) {
    const segundos = dias * 24 * 60 * 60;
    document.cookie = `${nombre}=${valor}; max-age=${segundos}; path=/`;
}

// Uso: Crear una cookie que dure 7 días
crearCookie("preferencia", "modo-oscuro", 7);




//FUNCION PARA SETEAR COOKIE BIEN CHUPETE
function setCookie(nombre, valor, dias) {
    // 1. Calculamos los segundos
    const segundos = dias * 24 * 60 * 60;
    
    // 2. Armamos la cookie con esteroides (Segura y fácil)
    document.cookie = `${nombre}=${encodeURIComponent(valor)}; max-age=${segundos}; path=/`;
    
    console.log(`Cookie '${nombre}' guardada por ${dias} días.`);
}

// Ejemplo de uso:
setCookie("idioma", "es-AR", 30); // Dura un mes



function getCookie(nombre) {
    // 1. Preparamos lo que vamos a buscar (ej: "usuario=")
    let nombreBusqueda = nombre + "=";
    
    // 2. Limpiamos espacios y dividimos el string por los puntos y coma
    let cookiesSeparadas = document.cookie.split(';');
    
    // 3. Recorremos cada trozo
    for (let i = 0; i < cookiesSeparadas.length; i++) {
        let c = cookiesSeparadas[i].trim(); // Quitamos espacios sobrantes
        
        // 4. Si encontramos el nombre al principio del trozo...
        if (c.indexOf(nombreBusqueda) === 0) {
            // 5. Devolvemos el valor decodificado
            return decodeURIComponent(c.substring(nombreBusqueda.length, c.length));
        }
    }
    
    // 6. Si no encontramos nada, devolvemos null
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