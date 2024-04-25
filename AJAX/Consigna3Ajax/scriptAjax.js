/*window.onload = function(){
    let campoSelectProvincia = document.getElementById("provincia");

    let campoSelectMunicipios = document.getElementById("municipio");
    let campoSelectComunas = document.getElementById("comunas");

    let divMunicipio = document.getElementById("divMuni");
    let divComuna = document.getElementById("divComu");


    campoSelectProvincia.addEventListener("change", function() {
        let ProvinciaElegida = campoSelectProvincia.value;

        let URLphp = `getMunicipiosColumnas.php?provincia=${ProvinciaElegida}`;

        if ( ProvinciaElegida === "1" || ProvinciaElegida === "2"){
            fetch(URLphp)
            .then((response) => response.json())
            .then((data) => {
                if(ProvinciaElegida === "1"){
                    divComuna.innerHTML = "";
                }
            })
        }
    })
}

*/
window.onload = function () {

    let provinciaSelect = document.getElementById("provincia");
    let municipiosSelect = document.getElementById("municipio");
    let comunaSelect = document.getElementById("comunas");
    let municipiosDiv = document.getElementById("divMuni");
    let comunaDiv = document.getElementById("divComu");

    provinciaSelect.addEventListener("change", function () {
        let ID_Select = provinciaSelect.value;   //En la variable provincia elegida guardo el valor del campo select
        let URLphp = `getMunicipiosColumnas.php?provincia=${ID_Select}`;  //A mi script donde obtengo los datos de la columna le paso como parametro el valor del campo select

        if (ID_Select === "1" || ID_Select === "2") {
            // Realiza una solicitud AJAX al script "getMunicipiosColumnas.php"
            fetch(URLphp)
                .then((response) => response.json())
                .then((data) => {
                    if (ID_Select === "1") {
                        // CABA: Rellena el campo select de comunas de la tabla
                        comunaSelect.innerHTML = "";
                        data.forEach((comuna) => {
                            let option = document.createElement("option");
                            option.value = comuna.nombre;
                            option.text = comuna.nombre;
                            comunaSelect.appendChild(option);
                        });
                        comunaDiv.style.display = "block";
                        municipiosDiv.style.display = "none";
                    } else {
                        // Buenos Aires: Rellena el select de municipios
                        municipiosSelect.innerHTML = "";
                        data.forEach((municipio) => {
                            let option = document.createElement("option");
                            option.value = municipio.nombre;
                            option.text = municipio.nombre;
                            municipiosSelect.appendChild(option);
                        });
                        municipiosDiv.style.display = "block";
                        comunaDiv.style.display = "none";
                    }
                })
                .catch((error) => {
                    console.error("Error al cargar los datos: " + error);
                });
        } else {
            // Si no se selecciona una provincia válida, oculta ambos campos
            municipiosDiv.style.display = "none";
            comunaDiv.style.display = "none";
        }
    });
}


/*

window.onload = function () {

    let campoSelectProvincia = document.getElementById("provincia");
    let campoSelectMunicipios = document.getElementById("municipio");
    let campoSelectComunas = document.getElementById("comunas");
    let divMunicipio = document.getElementById("divMuni");
    let divComuna = document.getElementById("divComu");

    campoSelectProvincia.addEventListener("change", function () {
        const ID = provinciaSelect.value;
        let URLphp = `getMunicipiosColumnas.php?provincia=${ID}`;

        if (ID === "1" || ID === "2") {
            // Realiza una solicitud AJAX al script "getMunicipiosColumnas.php"
            fetch(URLphp)
                .then((response) => response.json())
                .then((data) => {
                    if (ID === "1") {
                        // CABA: Rellena el select de comunas
                        campoSelectComunas.innerHTML = "";
                        data.forEach((comuna) => {
                            const option = document.createElement("option");
                            option.value = comuna.nombre;
                            option.text = comuna.nombre;
                            campoSelectComunas.appendChild(option);
                        });
                        divComuna.style.display = "block";
                        divMunicipio.style.display = "none";
                    } else {
                        // Buenos Aires: Rellena el select de municipios
                        campoSelectComunas.innerHTML = "";
                        data.forEach((municipio) => {
                            const option = document.createElement("option");
                            option.value = municipio.nombre;
                            option.text = municipio.nombre;
                            campoSelectComunas.appendChild(option);
                        });
                        divMunicipio.style.display = "block";
                        divComuna.style.display = "none";
                    }
                })
                .catch((error) => {
                    console.error("Error al cargar los datos: " + error);
                });
        } else {
            // Si no se selecciona una provincia válida, oculta ambos campos
            divMunicipio.style.display = "none";
            divComuna.style.display = "none";
        }
    });
} */