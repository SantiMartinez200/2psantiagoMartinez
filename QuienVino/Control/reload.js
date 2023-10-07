const reload = document.getElementById("reload");

reload.addEventListener("click", (_) => {
  // el _ es para indicar la ausencia de parametros
  location.reload();
});
