function totalidad_eliminar() {
  Swal.fire({
    title: "SEGURO?",
    text: "Se eliminarán TODAS las ASISTENCIAS! esta operación es irreversible.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      confirmacionDoble();
    }
  });
}

function confirmacionDoble() {
  Swal.fire({
    title: "SEGURO?",
    text: "Se eliminarán TODAS las ASISTENCIAS! (Doble confirmación)",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "eliminarAsistenciaTotalidad.php";
    }
  });
}

