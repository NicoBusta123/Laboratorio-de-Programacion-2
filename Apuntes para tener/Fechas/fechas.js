function getFechaVencimiento(){	
	//Instancia un objeto de la clase Date con una fecha dada.	
	var fecha = new Date(separarTerminos(document.getElementById("fAlquiler").value));
	
	/*Se toman la cantidad de dias que se quiere incrementar la fecha.	
	/Se suman los dias a la fecha dada y se la convierte en cadena para mostrar en pantalla.*/
	document.getElementById("fVto").setAttribute("value",sumarDias(fecha,parseInt(document.getElementById("dias").value)).toString());	
}

/********************FUNCIONES AUXILIARES**********************************************************************/
function separarTerminos(f){
	
	/*Se deben separar los valores de la fecha y se retorna una cadena, con el formato que requiere 
	la clase Date para iniciar con una fecha en particular*/	
	
	valFechas = f.split("/");
	
	/*Ejemplo: ingresa '20/01/2017' retorna '2017,01,20' */
	
	return valFechas[2]+','+valFechas[1]+','+valFechas[0];	
}

function sumarDias(f,d) {
	
	/*Suma a una fecha dada "f" una cantidad de días "d".  	
	 Ejemplo: f: "2017 01 20" d: 30 dias. La funcion cambia el mes y actualiza el valor a "2017 02 19".
	 Enero tiene 31 días, por lo que al sumar 30 días el resultado es el 19 del mes de Febrero.*/
    
	f.setDate(f.getDate()+d);	
	
	/*Retorna la fecha con el formato que se requiera, utilizando la funciones de la clase Date. 
	slice(-2): da formato al numero del dia o el mes: cuando son < 10, agrega un 0 a la izquierda.*/
	
	return ("0"+parseInt(f.getDate())).slice(-2) +'/'+ ("0"+parseInt(f.getMonth()+1)).slice(-2) +'/'+f.getFullYear();	
}



//CREAR FECHAS
const ahora = new Date(); // Fecha y hora actual
const fechaExacta = new Date(2026, 3, 21); // 21 de Abril de 2026 (Mes 3 = Abril)
const desdeString = new Date("2026-04-21T10:00:00"); // Formato ISO


//COMPARAR FECHAS
const ahora = new Date(); // Fecha y hora actual
const fechaExacta = new Date(2026, 3, 21); // 21 de Abril de 2026 (Mes 3 = Abril)
const desdeString = new Date("2026-04-21T10:00:00"); // Formato ISO


//OPERACIONES COMUNES 
const hoy = new Date();

// Sumar 5 días
hoy.setDate(hoy.getDate() + 5);

// Restar 2 meses
hoy.setMonth(hoy.getMonth() - 2);


//FORMATEO RAPIDO SIN LIBRERIAS
const fecha = new Date();

// Formato local (ej: 21/4/2026)
console.log(fecha.toLocaleDateString('es-AR')); 

// Formato largo y elegante
const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
console.log(fecha.toLocaleDateString('es-ES', opciones)); 
// "martes, 21 de abril de 2026"



//OBTENER LOS DIAS DE DIFERENCIAS ENTRE DOS FECHAS
const f1 = new Date('2026-04-01');
const f2 = new Date('2026-04-21');

const diferenciaEnMilisegundos = Math.abs(f2 - f1);
const diasDeDiferencia = diferenciaEnMilisegundos / (1000 * 60 * 60 * 24);

console.log(diasDeDiferencia); // 20


/**
 * CHEAT SHEET: OBTENER DATOS DE FECHA EN JS
 * Importante: Los meses van de 0 a 11
 */

const fecha = new Date(); // Usamos la fecha actual de ejemplo

// 1. Año completo (4 dígitos)
const año = fecha.getFullYear(); // 2026

// 2. Mes (OJO: 0-11. Enero es 0, Diciembre es 11)
const mes = fecha.getMonth(); 

// 3. Día del mes (1-31)
const diaMes = fecha.getDate(); 

// 4. Día de la semana (0-6. Domingo es 0, Sábado es 6)
const diaSemana = fecha.getDay(); 

// 5. Horas (0-23)
const horas = fecha.getHours();

// 6. Minutos (0-59)
const minutos = fecha.getMinutes();

// 7. Segundos (0-59)
const segundos = fecha.getSeconds();

// 8. Timestamp (Milisegundos desde el 1 de enero de 1970)
const timestamp = fecha.getTime();

// EXTRA: Obtener el mes real (humano)
const mesReal = fecha.getMonth() + 1;