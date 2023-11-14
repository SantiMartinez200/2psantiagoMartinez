function borrarAlumnos() {
  Swal.fire({
    title: "SEGURO?",
    text: "Se eliminarán TODOS LOS ALUMNOS! ESTA OPCIÓN ES IRREVERSIBLE.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      segundaConfirmacion();
    }
  });
}
// 
function segundaConfirmacion() {
  Swal.fire({
    title: "MUY SEGURO?",
    text: "Segunda confirmación.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "eliminarAlumnosTotalidad.php";
    }
  });
}
