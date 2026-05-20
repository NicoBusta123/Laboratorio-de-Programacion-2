

let usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];


let form = document.getElementById('frm_login');
let formRegis = document.getElementById('frm_register');






if (form !==null){
    form.addEventListener('submit', (event) =>{
    //Evitamos que la pagina se recague, eso pasa siempre XD
    event.preventDefault();
    iniciarSesion();
})
}

if (formRegis !==null){
    formRegis.addEventListener('submit',(event)=>{
    event.preventDefault();
    registrarse();
})
}


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


function iniciarSesion(){
    

    let input = document.getElementById('usuario').value.trim();
    let contrasenia = document.getElementById('password').value.trim();



    for (let index = 0; index < usuarios.length; index++) {
        const element = usuarios[index];
        
        if ((element.nombre === input || element.email === input) && element.contrasenia === contrasenia){
            usuarioLogueado = element.nombre;
            document.cookie = `nombre=${usuarioLogueado};max-age=600000;path=/`;
            window.location.href = 'dashboard.html';
            break;
        }else{
            alert("NO COINCIDE NADA!");
        }
    }
    
}

function registrarse(){
    

    let nombreUsuario = document.getElementById('nombre').value.trim();
    let apellidoUsuario = document.getElementById('apellido').value.trim();
    let emailUsuario = document.getElementById('email').value.trim();
    let contraseniaUsuario = document.getElementById('password').value.trim();


    for (let index = 0; index < usuarios.length; index++) {
        const element = usuarios[index];
        
        if (element.email === emailUsuario){
            console.log("ENTRA AL IF OSEA QUE COINDEN LAS CONTRASENIAS");
            alert("Ya existe ese usuario")
            break;
        }else{
            let usuario = {nombre: nombreUsuario,apellido: apellidoUsuario,email: emailUsuario,contrasenia: contraseniaUsuario};

            usuarios.push(usuario);

            localStorage.setItem('usuarios',JSON.stringify(usuarios));
            alert("Usuario Creado!");
            window.location.href('login.html');
        }
    }




    
}