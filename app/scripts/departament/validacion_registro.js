$(document).ready(function () {
  validate_name();
  validate_description();
});

function validate_name() {
  const nameDepaInput = document.getElementById("name_depa");
  const inputNombreDiv = document.getElementById("input_nombre");

  nameDepaInput.addEventListener("input", function () {
    const nameDepa = nameDepaInput.value.trim();
    const pattern = /^[a-zA-Z\d\sáéíóúüñÁÉÍÓÚÜÑ]+$/;

    switch (true) {
      case !pattern.test(nameDepa):
        inputNombreDiv.textContent =
          "El nombre de departamento solo puede contener letras, números y espacios.";
        break;
      case nameDepa.length >= 50:
        inputNombreDiv.textContent =
          "El nombre de departamento solo puede contener caracteres inferiores a 50.";
        break;
      default:
        inputNombreDiv.textContent = "";
        break;
    }
  });
}
function validate_description() {
  const desDepaInput = document.getElementById("des_depa");
  const inputDescripcionDiv = document.getElementById("input_descripcion");

  desDepaInput.addEventListener("input", function () {
    const desDepa = desDepaInput.value.trim();

    switch (true) {
      case desDepa.length >= 300:
        inputDescripcionDiv.textContent =
          "La descripción del departamento solo puede contener caracteres inferiores a 300.";
        break;
      default:
        inputNombreDiv.textContent = "";
        break;
    }
  });
}
