function inicio (){
    document.getElementById("edad").addEventListener("change", MostrarAutorizada)
}

function MostrarAutorizada(){
    //Muestro los equipos del grupo FAC
   let edadAutorizada = document.getElementById('edad');
   let numeroEdad = edadAutorizada.value;
   if(numeroEdad > 3 && numeroEdad < 18){
       document.getElementById("autorizar").classList.remove("AutorizadoOculto"); //agrego la clase que hace visible los grupos
   }else{
       document.getElementById("autorizar").classList.add("AutorizadoOculto"); //agrego la clase que hace visible los grupos

   }
}

window.onload = inicio;