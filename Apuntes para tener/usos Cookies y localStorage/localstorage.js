//TANTO EN COOKIE Y LOCALSTORAGE, SE GUARDAN EN FORMATO DE STRING
//POR LO TANTO, DEBEMOS CONVERTIR UN OBJETO EN STRING PARA GUARDARLO
//Y LUEGO, PARA UTILIZARLO, UTILIZAMOS PARSE PARA CONVERTIRLO OTRA VEZ EN OBJETO


let jugador = { nombre: "Alex", nivel: 5, victorias: 10};

// Para guardar: lo convertimos a texto
localStorage.setItem("datosJugador", JSON.stringify(jugador));

// Para leer: lo convertimos de vuelta a objeto
let datos = JSON.parse(localStorage.getItem("datosJugador"));
console.log(datos.nivel); // Imprime 5}


//SI TUVIESE UN ARRAY, SE VERIA ASI
// Así vive en la memoria RAM mientras la página está abierta
let tareasPendientes = ["Comprar pan", "Estudiar JS"];

// Proceso de conversión
let textoParaGuardar = JSON.stringify(tareasPendientes);

// Resultado (un solo String):
// "["Comprar pan","Estudiar JS"]"


// Sacamos el texto: "["Comprar pan","Estudiar JS"]"
let datosRecuperados = localStorage.getItem("tareasPendientesJuan");

// Lo convertimos de nuevo en Array:
let tareas = JSON.parse(datosRecuperados); 

// Ahora tareas vuelve a ser: ["Comprar pan", "Estudiar JS"]