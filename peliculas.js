//(funcion)(){
    var formulario = document.getElementById('formulario'),
		nombre = formulario.nombre,
		duracion = formulario.duracion,
		ano = formulario.ano,
		genero = formulario.genero,
    visto = formulario.visto,
		error = document.getElementById('error');
function validarNombre(e){
    if(nombre.value == '' || nombre == null){
        console.log('Completa el nombre');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingresa un Nombre</li>';
        e.preventDefault();
}else{
    error.style.display='none';
}
}

function validarGenero(e){
     if(genero.value == '' || genero == null){
        console.log('Completa el genero');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingresa un Genero</li>';
        e.preventDefault();
}else{
    error.style.display='none';
}
}

function validarForm(e){
   error.innerHTML = '';
   error.style.display = 'block';
   validarNombre(e);
   validarGenero(e);
}


formulario.addEventListener('submit', validarForm);

//}())
