const contenedor = document.getElementById("contenedor");
const personajeContainer = document.getElementById("contenedorRick");
const principal = document.getElementById("principal");
const maptext = document.getElementById("maptext");
var img1 = "/img/pngwing.com (1).png";
var img2 = "/img/pngwing.com.png";



function generarNumeroAleatorio() {
  return Math.floor(Math.random() * 826) + 1;
}
var numeroAleatorio = generarNumeroAleatorio();

async function miFuncion() {
  let GENEROu = "";
  let GeneroR = "";
  let cLat = 0;
  let cLon = 0;

  await fetch(`https://randomuser.me/api/`)
    .then((res) => res.json())
    .then((data) => {
      const datos = data.results;
      console.log(datos);

      const nombreu = document.createElement("h2");
      nombreu.textContent = "Nombre: " + datos[0].name.first;

      const img = document.createElement("img");
      img.src = datos[0].picture.large;

      const apellido = document.createElement("h2");
      apellido.textContent = "Apellido: " + datos[0].name.last

      const DNI = document.createElement("h2");
      DNI.textContent = "Identificacion: " + datos[0].id.value;

      const coordenadaLatitud = document.createElement("h2");
      coordenadaLatitud.textContent = "Latitud: " + datos[0].location.coordinates.latitude;

      const coordenadaLongitud = document.createElement("h2");
      coordenadaLongitud.textContent = "Longitud: " + datos[0].location.coordinates.longitude;

      cLat = datos[0].location.coordinates.latitude;
      cLon = datos[0].location.coordinates.longitude;

     GENEROu = datos[0].gender;
      
      if (GENEROu == "male") {
        document.getElementById("contenedor").style.backgroundColor = "green";
        GENEROu = "Male";
      } else if (GENEROu == "female") {
        document.getElementById("contenedor").style.backgroundColor = "yellow";
        GENEROu = "Female";
      }

      const generorandom = document.createElement("h2");
      generorandom.textContent = "Genero: " + GENEROu;

      const div = document.createElement("div");
      div.appendChild(nombreu);
      div.appendChild(apellido);
      div.appendChild(DNI);
      div.appendChild(coordenadaLatitud);
      div.appendChild(coordenadaLongitud);
      div.appendChild(generorandom);
      div.appendChild(img);
      
      contenedor.appendChild(div);
    })
  
  await fetch(`https://rickandmortyapi.com/api/character/${numeroAleatorio}`)
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      
      const imgn = document.createElement("img");
      imgn.src = data.image;

      const Nombre = document.createElement("h3");
      Nombre.textContent = "Nombre: " + data.name;

      const Estado = document.createElement("h3");
      Estado.textContent = "Estado: " + data.status;

      const Especie = document.createElement("h3"); 
      Especie.textContent = "Especie: " + data.species;

      const Genero = document.createElement("h3");
      Genero.textContent = "Género: " + data.gender;

      const cantEP = document.createElement("h3");
      cantEP.textContent = "Aparece en: " + data.episode.length + " Capítulos";

      const DIVr = document.createElement("div");
      DIVr.appendChild(imgn);
      DIVr.appendChild(Nombre);
      DIVr.appendChild(Estado);
      DIVr.appendChild(Genero); 
      DIVr.appendChild(cantEP);
      personajeContainer.appendChild(DIVr);

     GeneroR = data.gender;
    }
      
  )
  console.log(GENEROu, GeneroR);
  if (GeneroR == GENEROu) {
    console.log("Match!");
    var imagen = document.createElement("img");
    imagen.src = img1;
    principal.appendChild(imagen);
    imagen.classList.add('tickv');
  } else {
    console.log("No match.");
    var imagen2 = document.createElement("img");
    imagen2.src = img2;
    principal.appendChild(imagen2);
    imagen2.classList.add("tickw");
  }

  var map = L.map("map").setView([cLat, cLon], 2);
  
  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
      '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  }).addTo(map);

  var marker = L.marker([cLat, cLon]).addTo(map);

  let texto = document.createElement("h1");
  texto.textContent = "Esta es la ubicacion del RandomUser."

  maptext.appendChild(texto);

}


  