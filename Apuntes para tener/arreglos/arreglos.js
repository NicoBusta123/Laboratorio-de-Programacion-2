/**
 * ========================================================
 * 🚀 JAVASCRIPT ARRAYS & STRINGS CHEAT SHEET 🚀
 * Listo para copiar, pegar y experimentar.
 * ========================================================
 */

console.log("--- 1. CREACIÓN BÁSICA ---");
const frutas = ["manzana", "banana", "naranja"];
const numeros = [10, 20, 30, 40, 50];
console.log("Frutas iniciales:", frutas);

console.log("\n--- 2. AGREGAR Y QUITAR ELEMENTOS (Mutan el arreglo) ---");
frutas.push("uva"); // Agrega al final
console.log("Después de push('uva'):", frutas);

frutas.unshift("kiwi"); // Agrega al principio
console.log("Después de unshift('kiwi'):", frutas);

const ultima = frutas.pop(); // Quita el último y lo devuelve
console.log("Elemento eliminado con pop():", ultima);

const primera = frutas.shift(); // Quita el primero y lo devuelve
console.log("Elemento eliminado con shift():", primera);


console.log("\n--- 3. RECORRER (ITERAR) ARREGLOS ---");
// Opción A: for tradicional (útil si necesitas el índice y control total)
for (let i = 0; i < frutas.length; i++) {
  console.log(`for tradicional - Índice ${i}:`, frutas[i]);
}

// Opción B: for...of (La más limpia y moderna para simplemente recorrer)
for (const fruta of frutas) {
  console.log("for...of:", fruta);
}

// Opción C: forEach (Método de arreglo, útil si pasas funciones callbacks)
frutas.forEach((fruta, indice) => {
  console.log(`forEach - Posición ${indice}:`, fruta);
});


console.log("\n--- 4. RECORRER (ITERAR) CADENAS DE TEXTO (STRINGS) ---");
const saludo = "Hola Mundo";

// Los strings son iterables igual que los arreglos
for (const letra of saludo) {
  console.log("Letra:", letra);
}

// Convertir un string a un arreglo de letras
const arregloDeLetras = saludo.split(""); 
console.log("String a Arreglo con split():", arregloDeLetras);

// Convertir un string con palabras separadas a un arreglo
const frase = "Aprender JS es genial";
const palabras = frase.split(" ");
console.log("Palabras separadas:", palabras);


console.log("\n--- 5. BUSCAR Y COMPROBAR ---");
const colores = ["rojo", "verde", "azul", "amarillo"];

console.log("¿Incluye 'verde'?:", colores.includes("verde")); // true
console.log("Índice de 'azul':", colores.indexOf("azul")); // 2

// find: Devuelve el primer elemento que cumpla la condición
const numMayorA25 = numeros.find(num => num > 25);
console.log("Primer número mayor a 25:", numMayorA25); // 30

// findIndex: Igual que find, pero devuelve la posición
const indexMayorA25 = numeros.findIndex(num => num > 25);
console.log("Posición del primer número mayor a 25:", indexMayorA25); // 2


console.log("\n--- 6. TRANSFORMAR Y FILTRAR (Devuelven un arreglo nuevo) ---");
const precios = [100, 200, 300];

// map: Transforma cada elemento (ej. aplicar un 10% de descuento)
const conDescuento = precios.map(precio => precio * 0.90);
console.log("Precios originales:", precios);
console.log("Precios con 10% desc (map):", conDescuento);

// filter: Se queda solo con los que cumplen la condición
const edades = [15, 22, 17, 30, 12];
const mayoresDeEdad = edades.filter(edad => edad >= 18);
console.log("Mayores de edad (filter):", mayoresDeEdad);

// reduce: Reduce todo el arreglo a un solo valor (ej. sumar todo)
const totalPrecios = precios.reduce((acumulador, precioActual) => acumulador + precioActual, 0);
console.log("Suma total de precios (reduce):", totalPrecios);


console.log("\n--- 7. CORTAR, COPIAR Y COMBINAR ---");
const animales = ["perro", "gato", "loro", "pez", "tortuga"];

// slice: Copia una parte (desde el índice 1 hasta el 3, sin incluir el 3)
const mascotasComunes = animales.slice(1, 3);
console.log("Corte con slice(1, 3):", mascotasComunes); // ["gato", "loro"]


// splice: Elimina o reemplaza (MUTA el arreglo original)
// splice(inicio, cantidad_a_eliminar, items_a_insertar)
const letras = ["a", "b", "c", "d"];
letras.splice(1, 2, "X", "Y"); // En la pos 1, quita 2 elementos, pon X e Y
console.log("Después de splice:", letras); // ["a", "X", "Y", "d"]




//EXTRAIGO UN ELEMENTO 
const frutas = ["manzana", "pera", "uva"];
const indice = 1; // Queremos la pera

const resultado = frutas.splice(indice, 1); 
// frutas ahora es ["manzana", "uva"]
// resultado es ["pera"] (un arreglo)

const elementoExtraido = resultado[0]; 
// elementoExtraido ahora es "pera" (el texto suelto)







// Combinar arreglos (Spread Operator - Muy recomendado)
const arr1 = [1, 2];
const arr2 = [3, 4];
const combinados = [...arr1, ...arr2];
console.log("Arreglos combinados:", combinados); // [1, 2, 3, 4]


console.log("\n--- 8. ORDENAR ---");
const desordenados = [40, 1, 5, 200];

// sort por defecto ordena como texto (alfabéticamente)
console.log("Sort por defecto (cuidado con números):", [...desordenados].sort()); 

// sort con función de comparación para números (MUTA el original)
desordenados.sort((a, b) => a - b);
console.log("Sort numérico correcto:", desordenados); 

// reverse: Invierte el orden (MUTA el original)
desordenados.reverse();
console.log("Orden invertido:", desordenados);





//SI QUIERO ELIMINAR EL ULTIMO ELEMENTO DE UNA LISTA O TABLA ME PUEDE SERVIR INSTA
const lista = document.querySelector('ul');
const ultimoItem = lista.lastElementChild;
ultimoItem.remove(); // Elimina el último elemento de la lista   