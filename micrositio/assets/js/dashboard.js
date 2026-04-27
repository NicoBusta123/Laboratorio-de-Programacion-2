function setCookie(nombre, valor, dias) {
    // 1. Calculamos los segundos
    const segundos = dias * 24 * 60 * 60;
    
    // 2. Armamos la cookie con esteroides (Segura y fácil)
    document.cookie = `${nombre}=${encodeURIComponent(valor)}; max-age=${segundos}; path=/; SameSite=Lax`;
    
    console.log(`Cookie '${nombre}' guardada por ${dias} días.`);
}

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






// Este código se ejecuta al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    // Verificamos si estamos en el dashboard buscando el elemento del mensaje
    let mensaje = document.getElementById('mensajeUsuario');

    if (mensaje) {
        const usuarioLogueado = getCookie("nombre");

        if (usuarioLogueado) {
            mensaje.textContent = "Bienvenido, " + usuarioLogueado;
        } else {
            // Si no hay cookie, lo mandamos al login de vuelta
            alert("No has iniciado sesión");
            window.location.href = 'login.html';
        }
    }
});