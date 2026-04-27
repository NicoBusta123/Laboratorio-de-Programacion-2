let nombreUsuario = document.getElementById('usuario').value.trim();
let listaPendientes = document.getElementById('listaTareasPendientes');
let listaTerminadas = document.getElementById('listaTareasTerminadas');
//let tareasPendientes = JSON.parse(localStorage.getItem(`tareasPendientes${nombreUsuario}`) || []);
//let tareasTerminadas = JSON.parse(localStorage.getItem(`tareasTerminadas${nombreUsuario}`) || []);
let tareasTerminadas = [];
let tareasPendientes = [];

function ingresar(){
    nombreUsuario = obtenerUsuario();
    if (nombreUsuario){
        cantidadVisitas = parseInt(localStorage.getItem(`cantidadVisitas${nombreUsuario}`)) || 0;
        cantidadVisitas = cantidadVisitas + 1;
        localStorage.setItem(`cantidadVisitas${nombreUsuario}`,cantidadVisitas);
        tareasPendientes = JSON.parse(localStorage.getItem(`tareasPendientes${nombreUsuario}`) || "[]");
        tareasTerminadas = JSON.parse(localStorage.getItem(`tareasTerminadas${nombreUsuario}`) || "[]");
        

        //Cargo las tareas pendientes
        for (let index = 0; index < tareasPendientes.length; index++) {
            let tarea = tareasPendientes[index];
            let item = document.createElement("li");
            let boton = document.createElement("button");
            boton.setAttribute("data-accion", "terminar");
            boton.textContent = "Terminar";
            item.textContent = tarea+" ";
            item.appendChild(boton);
            listaPendientes.appendChild(item);
        };

        //Cargo las tareas terminadas
        for (let index = 0; index < tareasTerminadas.length; index++) {
            let tarea = tareasTerminadas[index];
            let item = document.createElement("li");
            item.textContent = tarea;
            listaTerminadas.appendChild(item);
        };

    



        if (cantidadVisitas === 0){
            document.getElementById('mensajeVisitas').textContent = "Es tu primer visita!";
        }
        else{
            document.getElementById('mensajeVisitas').textContent = "Es tu visita Nro "+cantidadVisitas;
        }
        document.getElementById('inicioSesion').classList.add('oculto');
        document.getElementById('administrador').classList.remove('oculto');
    }
    else{
        alert("Ingresa algo");
    }
}


function obtenerUsuario(){
    return document.getElementById('usuario').value.trim();
}

function ingresarTarea(){
    let tarea = document.getElementById('tarea').value.trim();
    let item = document.createElement("li");
    let boton = document.createElement("button");
    boton.setAttribute("data-accion", "terminar");
    boton.textContent = "Terminar";
    item.textContent = tarea+" ";
    item.appendChild(boton);
    listaPendientes.appendChild(item);
   
    tareasPendientes.push(tarea);
    localStorage.setItem(`tareasPendientes${nombreUsuario}`,JSON.stringify(tareasPendientes));
}

listaPendientes.addEventListener('click', (e) => {
    if (e.target.dataset.accion === 'terminar') {
        // 1. Obtenemos el elemento LI (el padre)
        let elementoLi = e.target.parentElement;
        
        // 2. EXTRAEMOS EL TEXTO (antes de borrar el botón)
        // Usamos .firstChild para ignorar el botón y sus atributos
        let textoDeLaTarea = elementoLi.firstChild.textContent.trim();

        // 3. Movemos el elemento en el DOM
        e.target.remove(); // Quitamos el botón
        listaTerminadas.appendChild(elementoLi);

        // 4. GUARDAMOS SOLO EL TEXTO (No el objeto elementoLi)
        tareasTerminadas.push(textoDeLaTarea);
        
        // Actualizamos el array de pendientes (quitando la que terminamos)
        tareasPendientes = tareasPendientes.filter(t => t !== textoDeLaTarea);

        // 5. Guardamos ambos en LocalStorage
        localStorage.setItem(`tareasPendientes${nombreUsuario}`, JSON.stringify(tareasPendientes));
        localStorage.setItem(`tareasTerminadas${nombreUsuario}`, JSON.stringify(tareasTerminadas));
    }
});



