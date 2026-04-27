/**
 * JAVASCRIPT OPERATORS CHEAT SHEET
 * Guía rápida de operaciones básicas y comparaciones
 */

// --- 1. OPERADORES ARITMÉTICOS ---
let a = 10;
let b = 3;

let suma = a + b;          // 13
let resta = a - b;         // 7
let multiplicacion = a * b; // 30
let division = a / b;      // 3.3333...
let residuo = a % b;       // 1 (El "porcentaje" o módulo: lo que sobra de la división)
let potencia = a ** b;     // 1000 (10 elevado al cubo)

// --- 2. OPERADORES DE ASIGNACIÓN ---
let x = 5;
x += 2; // Equivalente a: x = x + 2 (Resultado: 7)
x -= 1; // Equivalente a: x = x - 1 (Resultado: 6)
x *= 3; // Equivalente a: x = x * 3 (Resultado: 18)
x /= 2; // Equivalente a: x = x / 2 (Resultado: 9)

// --- 3. OPERADORES DE COMPARACIÓN ---
// Importante: Diferencia entre == y ===

let n = 5;
let s = "5";

// Igualdad débil (compara valor, no tipo)
console.log(n == s);  // true

// Igualdad estricta (RECOMENDADO: compara valor y tipo de dato)
console.log(n === s); // false (porque uno es Number y el otro es String)

// Desigualdad
console.log(n != 10);  // true (5 es diferente de 10)
console.log(n !== s); // true (son estrictamente diferentes en tipo)

// Relacionales
console.log(a > b);   // true (Mayor que)
console.log(a < b);   // false (Menor que)
console.log(a >= 10); // true (Mayor o igual)
console.log(a <= 5);  // false (Menor o igual)

// --- 4. OPERADORES LÓGICOS ---
let tieneEdad = true;
let tienePermiso = false;

// AND (&&): Ambas deben ser true
let puedeEntrar = tieneEdad && tienePermiso; // false

// OR (||): Al menos una debe ser true
let puedePasar = tieneEdad || tienePermiso; // true

// NOT (!): Invierte el valor
let noEsVerdad = !tieneEdad; // false

// --- 5. EJEMPLO PRÁCTICO: CÁLCULO DE PORCENTAJE ---
// Para sacar el 20% de un número:
let precio = 1500;
let descuento = 20;
let totalDescuento = (precio * descuento) / 100; // 300
let precioFinal = precio - totalDescuento;       // 1200

console.log("Precio final con descuento:", precioFinal);