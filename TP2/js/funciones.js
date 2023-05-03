const input = document.querySelector("input");
const button = document.querySelector("button");
const personajeContainer = document.querySelector(".personaje-container");
const episodioContainer = document.querySelector(".episodio-container");

button.addEventListener('click', (e) => {
  e.preventDefault();
  traerPersonaje(input.value);
}  )


function traerPersonaje(personaje) {
  fetch(`https://rickandmortyapi.com/api/character/${personaje}`)
    .then((res) => res.json())
    .then((data) => {
      crearPersonaje(data);
      //var episodioArray = data.episode;
      console.log(episodioArray);
      
    })
    .catch(error => console.log(error))
}

function crearPersonaje(personaje) {
  const img = document.createElement("img");
  img.src = personaje.image;

  const name = document.createElement("h3");
  name.textContent = "Nombre: " + personaje.name;

  const species = document.createElement("h4");
  species.textContent = "Raza: " + personaje.species;

  const status = document.createElement("h4");
  status.textContent = "Estado: " + personaje.status;

  const div = document.createElement("div");
  div.appendChild(img);
  div.appendChild(name);
  div.appendChild(species);
  div.appendChild(status);
  
  const episodioArray = personaje.episode;
  var foo = episodioArray.map(function (bar) {
    return "<li class='list-group-item active'>" + bar + "</li>";
  });
  document.getElementById("foo").innerHTML = foo;
  
  personajeContainer.appendChild(div);
  episodioContainer.appendChild(foo);
  
}



