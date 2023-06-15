$(document).ready(function () {
  setTimeout(function () {
    $.ajax({
      url: "/igbj/maintenance_center_search_for_update",
      method: "POST",
      data: { center_id: localStorage.getItem("center_id") },
      dataType: "json",
      success: function (data) {
        updateForm(data);
      },
    });
  }, 1000);

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
      $array = formulario.serializeArray();
      let center_id_obj = {
        name: "center_id",
        value: localStorage.getItem("center_id"),
      };
      $array.push(center_id_obj);
      $.ajax({
        url: "/igbj/maintenance_center_update",
        type: "POST",
        data: $array,
        dataType: "text",
        success: function (response, status, xhr) {
          if (xhr.status === 200) {
            alert(response);
            window.location.replace("/igbj/centros_mantenimiento");
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

function updateForm(data) {
  $.each(data, function (index, value) {
    $("#name_center").val(value["CENTROMANTENIMIENTO"]);
    $("#description").val(value["DESCRIPCION"]);
  });
}
