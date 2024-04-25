document.addEventListener("DOMContentLoaded", function () {
    const selectTransformaciones = document.getElementById("selectTransformaciones");
    const estadoSelect = document.getElementById("estadoSeleccionado");

    // Hacer una solicitud AJAX para obtener las transformaciones desde el servidor
    fetch("GetEstados.php")
        .then(response => response.json())
        .then(transformaciones => {
            // Limpiar opciones anteriores (por si acaso)
            selectTransformaciones.innerHTML = "";

            // Agregar las nuevas opciones desde los datos obtenidos
            transformaciones.forEach(transformacion => {
                const option = document.createElement("option");
                option.value = transformacion.id;
                option.text = transformacion.EstadoTransformacion;
                selectTransformaciones.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error al cargar las transformaciones: " + error);
        });

    // Maneja el evento de cambio del select
    estadoSelect.addEventListener("change", function () {
        // Actualiza el valor del campo oculto con la opción seleccionada
        estadoSeleccionado.value = estadoSelect.value;
    });
});
