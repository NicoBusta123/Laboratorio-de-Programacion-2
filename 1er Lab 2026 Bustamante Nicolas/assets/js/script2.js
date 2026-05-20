let usuario = JSON.parse(localStorage.getItem("usuario"));



document.getElementById('apellido').textContent = "Apellido: "+usuario.apellido;
document.getElementById('nombre').textContent = "Nombre: "+usuario.nombre;
document.getElementById('documento').textContent = "Documento: "+usuario.documento;
document.getElementById('fechaNacimiento').textContent = "Fecha de Nacimiento: "+usuario.fechaNacimiento;
document.getElementById('genero').textContent = "Genero: "+usuario.genero;

if (usuario.genero === "Masculino"){
    
    let imagen = document.createElement('img');

    imagen.setAttribute("src","assets/img/masculino.png");
    document.getElementById('genero').appendChild(imagen);
}else{
    if(usuario.genero ==="Femenino"){
    let imagen = document.createElement('img');
    imagen.setAttribute("src","assets/img/femenino.png");
    document.getElementById('genero').appendChild(imagen);
    }else{
        document.getElementById('genero').textContent = 'Genero Indistinto';
    }
    
  
}





document.getElementById('pais').textContent = "Pais: "+usuario.paisOrigen;
let imagen = null;
switch (usuario.paisOrigen){
    case "Argentina" : 
    imagen = document.createElement('img');
    imagen.setAttribute("src","assets/img/argentina.png");
    document.getElementById('pais').appendChild(imagen);
    break;


    case "Peru" : 
    imagen = document.createElement('img');
    imagen.setAttribute("src","assets/img/peru.png");
    document.getElementById('pais').appendChild(imagen);
    break;

    case "Brasil" : 
    imagen = document.createElement('img');
    imagen.setAttribute("src","assets/img/brasil.png");
    document.getElementById('pais').appendChild(imagen);
    break;

    case "Chile" : 
    imagen = document.createElement('img');
    imagen.setAttribute("src","assets/img/chile.png");
    document.getElementById('pais').appendChild(imagen);
    break;

    case "Colombia" : 
    imagen = document.createElement('img');
    imagen.setAttribute("src","assets/img/colombia.png");
    document.getElementById('pais').appendChild(imagen);
    break;

    case "Uruguay" : 
    imagen = document.createElement('img');
    imagen.setAttribute("src","assets/img/uruguay.png");
    document.getElementById('pais').appendChild(imagen);
    break;

}


document.getElementById('codigoVerificador').textContent = "Codigo verificador: "+usuario.codigoVerificador;
let hoy = new Date();
document.getElementById('fechaAlta').textContent = "Fecha de alta: "+hoy.toLocaleDateString('es-AR');
let fechaExpiracion = usuario.fechaExpiracion;

//No logre que la fecha de expiracion se muestre con mejor formato, no me termino gustando como se ve
document.getElementById('fechaExpiracion').textContent = "Fecha de expiracion: "+ fechaExpiracion;

