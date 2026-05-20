let form = document.getElementById("form");
let seccionForm = document.getElementById('seccionForm');

if (form !==null){
    form.addEventListener('submit', (event)=>{
    event.preventDefault();
    enviar();
});
}


function calcularCodigo(documento){
    let hoy = new Date();
    let añoactual = hoy.getFullYear();

    let cadena = documento+añoactual;

    let sumatoria = 0;
    for (let index = 0; index < cadena.length; index++) {
        const numero = cadena[index];
        const numeroMultiplicado = parseInt(numero) *  index;
        sumatoria = sumatoria + numeroMultiplicado;
    }

    return sumatoria;
}


function calcularFechaExpiracion(renueva){
    if (renueva ==="si"){
        let fechaExpiracion = new Date();
        fechaExpiracion.setDate(fechaExpiracion.getFullYear() + 2);
        return fechaExpiracion;
    }
    else{
        let fechaExpiracion = new Date();
        fechaExpiracion.setDate(fechaExpiracion.getFullYear()+10);
        return fechaExpiracion;
    }
}


function enviar(){
    let nombre = document.getElementById('nombre').value.trim();

    let apellido = document.getElementById('apellido').value.trim();
    let documento = document.getElementById('documento').value.trim();
    let fechaNacimiento = document.getElementById('fechaNacimiento').value;
    let genero = document.querySelectorAll(`input[name="${"genero"}"]:checked`);
    let paisOrigen = document.querySelectorAll(`input[name="${"pais"}"]:checked`);
    let renueva = document.querySelectorAll(`input[name="${"renueva"}"]:checked`);
    let siRenueva = renueva[0].value;

    
    seccionForm.classList.add('oculto');
    
    let codigoVerificador = calcularCodigo(documento);

    let fechaExpiracion = calcularFechaExpiracion(siRenueva);

    let usuario = {nombre: nombre,apellido: apellido,documento:documento,fechaNacimiento: fechaNacimiento,genero: genero[0].value,paisOrigen: paisOrigen[0].value, renueva: siRenueva,fechaExpiracion: fechaExpiracion,codigoVerificador: codigoVerificador};

    localStorage.setItem('usuario',JSON.stringify(usuario));

    window.location.href = "passport.html";


    

}

