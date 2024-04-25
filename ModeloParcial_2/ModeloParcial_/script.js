window.onload = function () {

    document.getElementById("edad").addEventListener("change", mostrarAutorizada)

    function mostrarAutorizada(){
        //Muesfila_tro los equipos del grupo FAC
       let edadAutorizada = document.getElementById('edad');
       let numeroEdad = edadAutorizada.value;

       if(numeroEdad > 3 && numeroEdad < 18){ //
           document.getElementById("autorizar").classList.remove("AutorizadoOculto"); //agrego la clase que hace visible los grupos
       }else{
           document.getElementById("autorizar").classList.add("AutorizadoOculto"); //agrego la clase que hace visible los grupos
    
       }
    }

    //Logica de mostrar datos en la pagina via ajax
    let url = 'datosAJAX.php';
    fetch(url)
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Error en la llamada a la API: ' + response.statusText);
            }
            return response.json();
        })
        .then(function (usuarios) {
            let tbody = document.querySelector('table#tabla_usuarios>tbody');  //Validacion para que exista el elemento <tbody> en mi pagina
            if (!tbody) {
                throw new Error('No existe el elemento table#tabla_usuarios>tbody');
            }
            for (let usuario of usuarios) {             //Recorro los datos que obtuve de la solicitud en php y a medida que lo hago, creo elementos HTML e inserto los datos
                let fila_tr = document.createElement('tr');  //creo una fila

                let columna_td = document.createElement('td');  //creo una columna
                columna_td.innerText = usuario.id;              //Asigno el valor del usuario a la columna columna_td
                fila_tr.appendChild(columna_td);                     //Se agrega la columna al final de la fila

                columna_td = document.createElement('td');
                columna_td.innerText = usuario.nombre;
                fila_tr.appendChild(columna_td);

                columna_td = document.createElement('td');
                columna_td.innerText = usuario.mail;
                fila_tr.appendChild(columna_td);

                columna_td = document.createElement('td');
                columna_td.innerText = usuario.edad;
                fila_tr.appendChild(columna_td);

                columna_td = document.createElement('td');
                columna_td.innerHTML = usuario.autorizado;
                fila_tr.appendChild(columna_td)

                tbody.appendChild(fila_tr);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
};

