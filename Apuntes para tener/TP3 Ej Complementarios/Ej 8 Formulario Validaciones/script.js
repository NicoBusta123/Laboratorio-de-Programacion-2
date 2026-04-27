
let cuotasMaximas = 60;


// Evitamos que la página se recargue al enviar el formulario
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("formulario").addEventListener("submit", function(event) {
        event.preventDefault(); 
        enviar();
    });
});


function enviar() {
    let divMensaje = document.getElementById("mensaje");
    divMensaje.innerHTML = ""; 

    // 1. Validaciones
    if (!calcularEdad()) {
        divMensaje.innerHTML = "<p style='color: red;'>Rechazado: Debes ser mayor de 18 años.</p>";
        return; 
    }
    if (!calcularAntiguedad()) {
        divMensaje.innerHTML = "<p style='color: red;'>Rechazado: Debes tener más de 2 años de antigüedad.</p>";
        return; 
    }

    // 2. Datos numéricos
    let importeSolicitado = parseFloat(document.getElementById('importe').value);
    let limiteCuotaMax = calcularMaximoCuota(); // El 30% del sueldo (lo MÁS que puede pagar por mes)
    let limiteCuotaMin = 550; // Lo MENOS que puede pagar por mes según la regla

    // 3. Lógica matemática directa (Sin Arrays)
    // Menor cantidad de cuotas (pagando lo máximo que le permite su sueldo)
    // Usamos Math.ceil para redondear para arriba (ej: si da 10.2 cuotas, necesita 11)
    let minCuotas = Math.ceil(importeSolicitado / limiteCuotaMax);

    // Mayor cantidad de cuotas (pagando el mínimo de $550)
    // Usamos Math.floor para redondear para abajo
    let maxCuotas = Math.floor(importeSolicitado / limiteCuotaMin);

    // Aplicamos la regla de que no pueden ser más de 60 cuotas
    if (maxCuotas > 60) {
        maxCuotas = 60;
    }

    // 4. Verificamos si el crédito es viable con su sueldo
    if (minCuotas > 60 || minCuotas > maxCuotas) {
        divMensaje.innerHTML = "<p style='color: red;'>Solicitud rechazada: Tu salario no alcanza para cubrir este préstamo ni siquiera en el plazo máximo de 60 meses.</p>";
    } else {
        // Calculamos cuánto pagaría exactamente en esos dos extremos
        let valorCuotaMasRapida = importeSolicitado / minCuotas;
        let valorCuotaMasLarga = importeSolicitado / maxCuotas;

        divMensaje.innerHTML = `
            <h3 style='color: green;'>¡Solicitud Aprobada!</h3>
            <p>El máximo que puedes pagar por mes es: <strong>$${limiteCuotaMax.toFixed(2)}</strong></p>
            <hr>
            <p><strong>Opción más rápida:</strong> ${minCuotas} cuotas de $${valorCuotaMasRapida.toFixed(2)}</p>
            <p><strong>Opción más extendida:</strong> ${maxCuotas} cuotas de $${valorCuotaMasLarga.toFixed(2)}</p>
        `;
    }
}

function calcularEdad(){
    let inputFechaNacimiento = document.getElementById('fechaNacimiento').value;

    let fechaNacimiento = new Date(inputFechaNacimiento);

    let hoy = new Date();

    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

    const mesDiferencia = hoy.getMonth() - fechaNacimiento.getMonth();


    //Ajuste fino: ¿Ya cumplió años este año?
    // Restamos un año si el mes actual es menor al de nacimiento
    // O si es el mismo mes pero el día actual es menor al de nacimiento
    if (mesDiferencia < 0 || (mesDiferencia === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
        edad--;
    }

    let añosRequeridos = 18;

    if (edad >= añosRequeridos){
        return true;
    }else{
        return false;
    }
}

function calcularAntiguedad(){
    let inputFechaIngreso = document.getElementById('fechaIngreso').value;
    
    let fechaIngreso = new Date(inputFechaIngreso);

    let hoy = new Date();

    let antiguedad = hoy.getFullYear() - fechaIngreso.getFullYear();

    const mesDiferencia = hoy.getMonth() - fechaIngreso.getMonth();

    //Mismo calculo de consistencia que en el de la fecha de nacimiento
    if (mesDiferencia < 0 || (mesDiferencia === 0 && hoy.getDate() < fechaIngreso.getDate())) {
        antiguedad--;
    }

    let añosRequeridos = 2;

    if (antiguedad >= añosRequeridos){
        return true;
    }else{
        return false;
    }
}

function calcularMaximoCuota(){
    let sueldo = document.getElementById('salario').value;

    let maximo = 30;

    let maximoCuota = (sueldo * maximo)/100;

    return maximoCuota;
}

