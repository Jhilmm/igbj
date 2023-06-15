$(document).ready(function () {
  updateForm();
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
      if (is_valid_form && input.hasClass("is-invalid")) {
        is_valid_form = false;
      }
    });
    if (is_valid_form == true) {
      $.ajax({
        url: "/igbj/assign_position",
        type: "POST",
        data: formulario.serializeArray().concat([
          {
            name: "personnel_id",
            value: localStorage.getItem("personnel_id"),
          },
        ]),
        dataType: "text",
        success: function (response, status, xhr) {
          if (xhr.status === 200) {
            alert(response);
            window.location.replace("/igbj/personal");
          }
        },
        error: function (xhr, status, error) {
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

function updateForm() {
  $("#name").val(localStorage.getItem("person_name"));
  $("#item").val(localStorage.getItem("item_id"));
  load_all_departments();
}

function load_all_departments() {
  $.ajax({
    url: "/igbj/get_all_departments",
    method: "POST",
    success: function (data) {
      updateDepartmentOptions(data).then(function () {
        $("#department").on("change", function (event) {
          load_all_position($(this).val());
        });
      });
    },
  });
}

function updateDepartmentOptions(data) {
  return new Promise(function (resolve, reject) {
    let select_input = $("#department");
    select_input.empty();
    select_input.append(
      $("<option>").attr("value", "").text("Seleccione una opción")
    );
    $.each(data, function (index, value) {
      let option = $("<option>")
        .attr("value", value["CODDEPARTAMENTO"])
        .text(value["NOMBDEPARTAMENTO"]);
      select_input.append(option);
    });
    resolve();
  });
}

function load_all_position(cod_department) {
  $.ajax({
    url: "/igbj/get_all_position",
    method: "POST",
    data: { cod_department: cod_department },
    dataType: "json",
    success: function (data) {
      updatePositionOptions(data).then(function () {
      });
    },
  });
}
function updatePositionOptions(data) {
  return new Promise(function (resolve, reject) {
    let select_input = $("#position");
    select_input.empty();
    select_input.append(
      $("<option>").attr("value", "").text("Seleccione una opción")
    );
    $.each(data, function (index, value) {
      let option = $("<option>")
        .attr("value", value["CODCARGO"])
        .text(value["CARGO"]);
      select_input.append(option);
    });
    resolve();
  });
}
