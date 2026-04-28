const form = document.getElementById("form");

form.addEventListener('submit', (event) => {
    event.preventDefault();
    calcularPuntaje();
});

const puntajes = {
    desayuno: { "Cafe": 3, "Leche": 2, "Tostadas": 2, "Limon": 0, "Manteca": 1, "MediasLunas": 2, "Ajo": -1 },
    fruta: { "Pasas": 10, "Ciruelas": 0, "Anacardo": 0 },
    caldo: { "QuitarGrasa": 0, "PocaCoccion": 10 },
    temperatura: { "180": 8, "200": 0, "170": 2 },
    pan: { "panBlanco": 0, "panGerminado": 2, "acimo": 8 }
};

// Función genérica para sumar puntos de cualquier pregunta
function obtenerSumaPregunta(categoria, nombreHtml) {
    let seleccionados = document.querySelectorAll(`input[name="${nombreHtml}"]:checked`);
    let suma = 0;
    seleccionados.forEach(element => {
        suma += puntajes[categoria][element.value] || 0;
    });
    return suma;
}

function calcularPuntaje(){
    let puntajeP1 = obtenerSumaPregunta('desayuno','desayuno');
    let puntajeP2 = obtenerSumaPregunta('fruta','fruta');
    let puntajeP3 = obtenerSumaPregunta('caldo','caldo');
    let puntajeP4 = obtenerSumaPregunta('temperatura','temperatura');
    let puntajeP5 = obtenerSumaPregunta('pan','pan');

    let puntajeTotal = puntajeP1*0.30 + puntajeP2*0.05 + puntajeP3*0.10 + puntajeP4*0.30 + puntajeP5*0.25;

    let contenedorMensaje = document.getElementById('mensaje'); // El DIV padre
    let textoResultado = document.getElementById('resultado'); // El H3 donde va el texto
    
    // Mostramos el contenedor y ocultamos las preguntas
    contenedorMensaje.classList.remove('oculto');
    document.getElementById('seccionPreguntas').classList.add('oculto');   

    if(puntajeTotal >= 8){
        textoResultado.textContent = "Califica para ser cocinero! Felicitaciones!";
    } else if(puntajeTotal >= 6){
        textoResultado.textContent = "Califica para ser ayudante de cocina! Felicitaciones!";
    } else {
        textoResultado.textContent = "No califica, ¡a seguir practicando!";
    }
}
    

