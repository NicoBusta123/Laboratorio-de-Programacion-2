function buscarPersona(){
    var nroDocumento = document.getElementById("nroDocumento").value.trim();
    var listaOperaciones = document.getElementById("listaOperaciones");

    if (nroDocumento.trim() === ""){
        alert("Ingrese un numero de documento");
        return; //corto la ejecucion si esta vacio
    }

    var peticion = new XMLHttpRequest();

    peticion.open("GET","get_persona.php?nroDocumento="+nroDocumento,true);

    peticion.onreadystatechange = function(){
        if (peticion.readyState === 4 && peticion.status === 200){
            var datos = JSON.parse(peticion.responseText);

            

            datos.forEach(operacion => {
                var li = document.createElement("li");
                var p = document.createElement("p");
                p.innerHTML = "Tipo de operacion: "+operacion.tipoOperacion+ " Fecha de inicio: "+operacion.FechaInicio+ " Importe: "+operacion.importe;
                li.appendChild(p);
                listaOperaciones.appendChild(li);
                
            });
        }
    }

    peticion.send(null);
}