window.onload = function () {
    let elLoading = document.querySelector('#loading_tabla_clientes');
    if (!elLoading) {
        throw new Error('No existe el elemento #loading_tabla_clientes');
    }
    elLoading.classList.remove('d-none');
    let url = 'getClientes.php';
    fetch(url)
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Error en la llamada a la API: ' + response.statusText);
            }
            return response.json();
        })
        .then(function (clientes) {
            let tbody = document.querySelector('table#tabla_clientes>tbody');
            if (!tbody) {
                throw new Error('No existe el elemento table#tabla_clientes>tbody');
            }
            for (let cliente of clientes) {
                let tr = document.createElement('tr');
                let td = document.createElement('td');
                td.innerText = cliente.id;
                tr.appendChild(td);
                td = document.createElement('td');
                td.innerText = cliente.nombre;
                tr.appendChild(td);
                td = document.createElement('td');
                td.innerText = cliente.cuil;
                tr.appendChild(td);
                td = document.createElement('td');
                td.innerText = cliente.usuario_creador;
                tr.appendChild(td);
                td = document.createElement('td');
                let aEditar = document.createElement('a');
                aEditar.setAttribute('href', 'editar_cliente.php?id=' + cliente.id);
                aEditar.classList.add('btn', 'btn-primary');
                aEditar.innerText = 'Editar';
                td.appendChild(aEditar);
                let aEliminar = document.createElement('a');
                aEliminar.setAttribute('href', 'eliminar_cliente.php?id=' + cliente.id);
                aEliminar.classList.add('btn', 'btn-danger');
                aEliminar.innerText = 'Eliminar';
                td.appendChild(aEliminar);
                tr.appendChild(td);
                tbody.appendChild(tr);
            }
            elLoading.classList.add('d-none');
        })
        .catch(function (error) {
            console.log(error);
        });
};

/*
fetch(`getMunicipiosColumnas.php?provincia=${selectedProvincia}`)
                .then((response) => response.json())
                .then((data) => {
                    if (selectedProvincia === "1") {
                        // CABA: Rellena el select de comunas
                        comunaSelect.innerHTML = "";
                        data.forEach((comuna) => {
                            const option = document.createElement("option");
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
                            const option = document.createElement("option");
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
*/