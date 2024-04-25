window.onload = function(){
    let Contenido = document.getElementById("contenido"); //Obtengo todos los elementos por su id, links y tambien de la seccion
    let NoticiaNacional = document.getElementById("Noticia");
    let NotiDeporte = document.getElementById("Deporte");
    let NotiEspectaculo = document.getElementById("Espectaculo");

    function contenidoCargar (archivoJson, nameNotice){ // funcion que uso para cargar las secciones en la pagina (recibe un archivo.json y una variable como parametros)

        fetch(archivoJson) //realizo la solicitud del archivoJson con fetch
        .then((response) => response.json()) //Funcion .then para procesar la respuesta del archivo .sjon 

        .then((data) => { //Funcion .then para procesar el contenido devuelto del archivo .json

            Contenido.innerHTML = "";  //Limpio el contenido
            
            data[nameNotice].forEach((noticia) => {  //Para recorrer el contenido del archivo, uso data[nameNotice] 
                let articulo = document.createElement ("article");  //variable articulo crea el elemtno article
                
                //El articulo contiene el titlulo, descripcion, fecha y autor de la noticia
                articulo.innerHTML =  `    
                <h2>${noticia.title}</h2>
                <p>${noticia.description}</p>
                <p>${noticia.date}</p>
                <footer>${noticia.autor}</footer>
            `; //Escribo en la pagina todo el contenido encontrado 

            contenido.appendChild(articulo); //agrego el contenido a la seccion
            });
        }).catch((error) => console.error("Error al cargar las noticias: " + error)); //Si no pude procesar el archivo, muestro el error en consola
    }

    //Escucho el evento click que me invoca la funcion contenidoCargar()
    NoticiaNacional.addEventListener("click", function (event){ 
        event.preventDefault();   
        $nombreNoticia = "nacionales" //El nombre de la seccion lo guardo en la variable 
        contenidoCargar("noticiasGenerales.json", $nombreNoticia); // Paso por parametro el archivo.json correspondiente de la noticia y la variable 
    });

    NotiDeporte.addEventListener("click", function (event){
        event.preventDefault();
        $nombreNoticia = "Deporte"
        contenidoCargar("deportes.json", $nombreNoticia);
    });

    NotiEspectaculo.addEventListener("click", function (event){
        event.preventDefault();
        $nombreNoticia = "Espectaculo"
        contenidoCargar("espectaculos.json", $nombreNoticia);
    });
};
