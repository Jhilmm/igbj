$(document).ready(function () {
  let $submit_btn = $("#btn-send");
  $submit_btn.on("click", function (event) {
    event.preventDefault();
    let is_valid_form = true;
    let formulario = $("#form");
    formulario.children().each(function () {
      let input = $(this)
        .children()
        .filter(".form-control, .form-control-radio");
      input.click();
      if (input.hasClass("is-invalid") && is_valid_form) {
        is_valid_form = false;
      }
    });
    if (is_valid_form == true) {
      $.ajax({
        url: baseURL + "/maintenance_center_register",
        type: "POST",
        data: formulario.serializeArray(),
        dataType: "text",
        success: function (response, status, xhr) {
          if (xhr.status === 200) {
            alert(response);
            window.location.replace(baseURL + "/centros_mantenimiento");
          } else {
            console.log(response);
          }
        },
        error: function (xhr, status, error) {
          console.error(xhr, status, error);
          alert(
            "Ha ocurrido un error en la solicitud AJAX. Mensaje de error: " +
              xhr.responseText
          );
        },
      });
    } else {
      alert("Por favor complete todos los campos correctamente");
    }
  });
});
