let tareas =    JSON.parse(localStorage.getItem('misTareas'))||[];
cargarTareas();

function agregarTarea(){

    const input = document.getElementById("idTareaIngresada");
    if (input.value.trim() === '') return;
    const nuevaTarea = {
        id: Date.now(),
        nombre: input.value,
        estado: false
    };

    tareas.push(nuevaTarea);
    guardarYRecargar();
    input.value = "";

}

function cambiarEstado(id){
    for (let i = 0; i < tareas.length; i++) {
        if (tareas[i].id === id){
            tareas[i].estado = !tareas[i].estado;
            break;
        }
    }
    guardarYRecargar();

}


function guardarYRecargar(){
    localStorage.setItem('misTareas', JSON.stringify(tareas));
    cargarTareas();
}




function cargarTareas() {
    const tablaPendientes = document.getElementById('idTablaPendientes');
    const tablaCompletadas = document.getElementById('idTablaCompletadas');

    // Reiniciamos las tablas con sus encabezados para que no se acumulen
    const encabezado = `<tr><td>Nombre de la Tarea</td><td>Accion</td></tr>`;
    tablaPendientes.innerHTML = encabezado;
    tablaCompletadas.innerHTML = encabezado;

    tareas.forEach(tarea => {
        // Importante: usar tarea.nombre (como lo definiste en agregarTarea)
        const row = `<tr>
            <td>${tarea.nombre}</td>
            <td><button onclick="cambiarEstado(${tarea.id})">
                ${tarea.estado ? 'Deshacer' : 'Realizar'}
            </button></td>
        </tr>`;

        if (tarea.estado) {
            tablaCompletadas.innerHTML += row;
        } else {
            tablaPendientes.innerHTML += row;
        }
    });
}