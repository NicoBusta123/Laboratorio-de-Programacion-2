


//EN CASO DE QUE QUIERA ELIMINAR EL ULTIMO HIJO DE UN ELEMENTO
const lista = document.querySelector('ul');
const ultimoHijo = lista.lastElementChild;

if (ultimoHijo) {
  lista.removeChild(ultimoHijo);
}


//O LA FORMA MAS MODERNA ES ASI
const lista = document.querySelector('ul');
lista.lastElementChild.remove();