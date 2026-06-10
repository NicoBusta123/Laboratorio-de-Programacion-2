function cargarCiudadesAsincronico() {
    // Capturamos los elementos del DOM de la interfaz
    var selectPais = document.getElementById("comboPais");
    var selectCiudad = document.getElementById("comboCiudad");
    var idPais = selectPais.value;

    // Control preventivo: Si vuelve a seleccionar la opción por defecto, limpiamos las ciudades
    if (idPais === "") {
        selectCiudad.innerHTML = '<option value="">-- Seleccione un país primero --</option>';
        return;
    }

    // PASO 1: Instanciación del objeto en memoria
    var peticion = new XMLHttpRequest();

    // PASO 2: Configuración de la apertura (Método GET, URL dinámica con variables, true de Asincrónico)
    peticion.open("GET", "get_ciudades.php?id_pais=" + idPais, true);

    // PASO 3: Definición del Callback mediante la propiedad onreadystatechange
    // NOTA: Se define OBLIGATORIAMENTE antes del método .send()
    peticion.onreadystatechange = function() {
        // Monitoreamos que la petición haya terminado (readyState 4) y que el servidor responda OK (status 200)
        if (peticion.readyState === 4 && peticion.status === 200) {
            
            // Transformamos la cadena plana recibida en responseText a un objeto JSON iterable
            var ciudades = JSON.parse(peticion.responseText);

            // Reseteamos el contenido del select de ciudades para que no acumule anteriores
            selectCiudad.innerHTML = '<option value="">-- Seleccione una Ciudad --</option>';

            // PASO 7 DEL CICLO: Recorremos las ciudades e insertamos dinámicamente nuevos nodos en el DOM
            ciudades.forEach(function(ciudad) {
                var nuevaOpcion = document.createElement("option");
                nuevaOpcion.value = ciudad.id_ciudad;
                nuevaOpcion.text = ciudad.nombre_ciudad;
                selectCiudad.appendChild(nuevaOpcion); // Insertamos la opción en el DOM
            });
        }
    };

    // PASO 4: Envío definitivo de la petición (Pasamos null porque los parámetros ya viajan en la URL del GET)
    peticion.send(null);
}