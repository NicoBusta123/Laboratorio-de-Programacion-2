//Numero random decimal entre 0 y 1 (no llega a ser 1)
console.log(Math.random()); // Ejemplo: 0.456123...


//Generar un numero random entre 0 y un maximo
const num0a10 = Math.floor(Math.random() * 11);


//Generar un numero aleatorio entre un minimo y un maximo
function generarAleatorio(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

const suerte = generarAleatorio(5, 15); // Número entre 5 y 15



//Seleccionar un elemento aleatorio de un arreglo
const colores = ["Rojo", "Azul", "Verde", "Amarillo"];

const indiceAleatorio = Math.floor(Math.random() * colores.length);
const colorElegido = colores[indiceAleatorio];

console.log(colorElegido); // Devuelve un color al azar


//Mezclar arreglo
function mezclar(arreglo) {
  for (let i = arreglo.length - 1; i > 0; i--) {
    // Elegimos un índice aleatorio entre 0 e i
    const j = Math.floor(Math.random() * (i + 1));
    
    // Intercambiamos los valores (usando desestructuración)
    [arreglo[i], arreglo[j]] = [arreglo[j], arreglo[i]];
  }
  return arreglo;
}