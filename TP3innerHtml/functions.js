document.querySelector("#ent").addEventListener("click", miFuncion, (e) => {
  e.preventDefault();
});
var img1 = "pngwingv.png";
var img2 = "pngwing.com.png";

var lat = 0;
var lon = 0;




async function miFuncion() {
  let GeneroR = "";
  let GeneroU = "";

  await fetch(`https://randomuser.me/api/`)
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      const datos = data.results;
      
      let randomCont = document.querySelector("#randomUser");
      randomCont.innerHTML = `
        <h3>Nombre: ${datos[0].name.first}</h3>
        <h3>Apellido: ${datos[0].name.last}</h3>
        <h3>Género: ${datos[0].gender}</h3>
        <h3>DNI: ${datos[0].id.value}</h3>
        <h3>Longitud: ${datos[0].location.coordinates.latitude}</h3>
        <h3>Latitud: ${datos[0].location.coordinates.longitude}</h3>
        <img src=${datos[0].picture.large} />
      `;

      if (datos[0].gender == "male") {
        document.getElementById("randomUser").style.backgroundColor = "green";
        GeneroU = "Male";
      } else if (datos[0].gender == "female") {
        document.getElementById("randomUser").style.backgroundColor = "yellow";
        GeneroU = "Female";
      }
      lat = datos[0].location.coordinates.latitude;
      lon = datos[0].location.coordinates.longitude;
    });

  ////////////////////////////////////////////////////////////////////////////

  /*nombre,estado,especie,genero,cantEP,imagen */
    function generarNumeroAleatorio() {
      return Math.floor(Math.random() * 826) + 1;
    }
    let numeroAleatorio = generarNumeroAleatorio();

  await fetch(`https://rickandmortyapi.com/api/character/${numeroAleatorio}`)
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      GeneroR = data.gender;

      let rickCont = document.querySelector("#rickMorty");
      rickCont.innerHTML = `
        <h3>Nombre: ${data.name} </h3>
        <h3>Estado: ${data.status}</h3>
        <h3>Especie: ${data.species}</h3>
        <h3>Género: ${data.gender}</h3>
        <h3>Cantidad de Episodios en los que aparece: ${data.episode.length}</h3>
        <img src=${data.image} />
      `;

      if (data.gender == "Male") {
        document.getElementById("rickMorty").style.backgroundColor = "#7fffd4";
      } else if (data.gender == "Female") {
        document.getElementById("rickMorty").style.backgroundColor = "#dc143c";
      } else if (data.gender == "Genderless"){
        document.getElementById("rickMorty").style.backgroundColor = "#808080";
      } else {
        document.getElementById("rickMorty").style.backgroundColor = "#ffa500";
      }
    });
  ////////////////////////////////////////////////////////////////////////////
  let icon = document.querySelector("#match");
  if (GeneroR == GeneroU) {
    console.log("Match!");
    icon.innerHTML = `<img src=${img1} />`;
    
  } else {
    console.log("No match.");
    icon.innerHTML = `<img src=${img2} />`;
    
  }
  
  var container = L.DomUtil.get("map");
  if (container != null) {
    container._leaflet_id = null;
  }
  
   var map = L.map("map").setView([lat, lon], 3);
   L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
     maxZoom: 19,
     attribution:
       '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
   }).addTo(map);
  var marker = L.marker([lat, lon]).addTo(map);
  
  
}