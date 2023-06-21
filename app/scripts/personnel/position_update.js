$(document).ready(function () {
  setTimeout(function () {
    $.ajax({
      url: baseURL + "/personnel_position_search",
      method: "POST",
      data: { assign_position_id: localStorage.getItem("assign_position_id") },
      dataType: "json",
      success: function (data) {
        updateForm(JSON.parse(JSON.stringify(data))[0]);
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
      if (is_valid_form && input.hasClass("is-invalid")) {
        is_valid_form = false;
      }
    });
    if (is_valid_form == true) {
      $.ajax({
        url: baseURL + "/update_position_assigned",
        type: "POST",
        data: formulario.serializeArray().concat([
          {
            name: "id",
            value: localStorage.getItem("assign_position_id"),
          },
        ]),
        dataType: "text",
        success: function (response, status, xhr) {
          if (xhr.status === 200) {
            alert(response);
            window.location.replace(baseURL + "/personal");
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

function updateForm(data) {
  $("#name").val(localStorage.getItem("person_name"));
  $("#item").val(localStorage.getItem("item_id"));
  const dateValue = new Date(data.FECHAASIGNACION);
  if (!isNaN(dateValue)) {
    $("#date").val(dateValue.toISOString().substring(0, 10));
  }
  $("#cod_memo").val(data.MEMODESIGNACION);
  load_all_departments(data.CODDEPARTAMENTO, data.CODCARGO);
}

function load_all_departments(cod_department, cod_cargo) {
  $.ajax({
    url: baseURL + "/get_all_departments",
    method: "POST",
    success: function (data) {
      updateDepartmentOptions(data).then(function () {
        $("#department").on("change", function (event) {
          load_all_position($(this).val(), cod_cargo);
        });
        $("#department")
          .find("option")
          .each(function () {
            if ($(this).val() == cod_department) {
              $(this).attr("selected", true);
              $("#department").trigger("change");
            }
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

let positionCodeExecuted = false;
function load_all_position(cod_department, cod_cargo) {
  $.ajax({
    url: baseURL + "/get_all_position",
    method: "POST",
    data: { cod_department: cod_department },
    dataType: "json",
    success: function (data) {
      updatePositionOptions(data).then(function () {
        if (!positionCodeExecuted) {
          $("#position")
            .find("option")
            .each(function () {
              if ($(this).val() == cod_cargo) {
                $(this).attr("selected", true);
              }
            });
          positionCodeExecuted = true;
        }
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
