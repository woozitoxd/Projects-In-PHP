window.onload = function(){
    let campoSelectProvincia = document.getElementById("provincia");
    let campoSelectMunicipios = document.getElementById("municipios");
    let campoSelectComunas = document.getElementById("comunas");

    let divMunicipio = document.getElementById("divMuni");
    let divComuna = document.getElementById("divComu");

    campoSelectProvincia.addEventListener("change", function(){
        let provinciaElegida = campoSelectProvincia.value;

        campoSelectMunicipios.innerHTML = "";
        campoSelectComunas.innerHTML = "";

        if ( provinciaElegida === "Buenos Aires"){
            divMunicipio.style.display = "block";
            divComuna.style.display = "none";
            
            fetch("municipio.json")
            .then((response) => response.json())
            .then((data) =>{
                data.municipio.forEach((municipio) => {
                    const opcion = document.createElement ( "option");
                    opcion.text = municipio;
                    campoSelectMunicipios.appendChild(opcion);
                    
                });
            }).catch((error) => console.error("Error al cargar municipios: " + error));
        }else if ( provinciaElegida === "CABA"){
            divMunicipio.style.display = "none";
            divComuna.style.display = "block";
            
            fetch("comuna.json")
                .then((response) => response.json())
                .then((data) => {
                    data.comuna.forEach((comuna) => {
                        const opcion = document.createElement ( "option");
                        opcion.text = comuna;
                        campoSelectComunas.appendChild(opcion);
                    });
                })
            .catch((error) => console.error("Error al cargar colmunas: " + error));


        }
    });
};
