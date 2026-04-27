//Concatenar cadenas
const tarea = "Estudiar JS";
const mensaje = `La tarea actual es: ${tarea.toUpperCase()}`; 
// "La tarea actual es: ESTUDIAR JS"

//O SINO LA TIPICA DE HACER "Caca" + usuario1 + "caca2"

//Limpieza de espacios
const entrada = "   comprar pan   ";
const limpio = entrada.trim(); // "comprar pan"

//Devuelve true si encuentra una palabra
const nota = "Recordar comprar huevos";
console.log(nota.includes("comprar")); // true


//Para saber si una palabra termina o empieza con
if (archivo.endsWith(".pdf")) { ... }
if (archivo.startsWith('caca')) {...}

//Extraer parte de una cadena
const texto = "JavaScript";
const parte = texto.slice(0, 4); // "Java"

//Reemplaza las coincidencias
const frase = "No me gusta Java, Java es difícil";
const nueva = frase.replaceAll("Java", "JavaScript");


//toLowerCase()
//toUpperCase()
//lenght Cuantos caracteres tiene
//repeat(n) repite la cadena n veces


//Ejemplo
const inputTarea = document.getElementById("input").value;

if (inputTarea.trim().length === 0) {
    alert("¡No podés dejar la tarea vacía!");
} else {
    // Aquí la agregas al arreglo
}