$(document).ready(function () {
  load_all_professions();
  updateCIExpeditionOptions();
  setTimeout(function () {
    $.ajax({
      url: "/igbj/person_search",
      method: "POST",
      data: { ci: localStorage.getItem("person_id") },
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
      $.ajax({
        url: "/igbj/update_person",
        type: "POST",
        data: formulario.serializeArray(),
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

function updateForm(data) {
  $.each(data, function (index, value) {
    $("#num_ci").val(value["CI"]);
    $("#ci_expedition")
      .find("option")
      .each(function () {
        if ($(this).val() == value["EXPEDIDOCI"]) {
          $(this).attr("selected", true);
        }
      });
    $("#profession")
      .find("option")
      .each(function () {
        if ($(this).val() == value["CODPROFESION"]) {
          $(this).attr("selected", true);
        }
      });
    $("#name").val(value["NOMBRES"]);
    $("#lastname").val(value["APPATERNO"]);
    $("#second_lastname").val(value["APMATERNO"]);
    const dateValue = new Date(value["FECHANACIMIENTO"]);
    if (!isNaN(dateValue)) {
      $("#date").val(dateValue.toISOString().substring(0, 10));
    }
    $("#address").val(value["DIRECCION"]);
    $("#phone").val(value["TELEFONO"]);
    $("#cell_phone").val(value["CELULAR"]);
    $("#email").val(value["CORREO"]);
    if (value["SEXO"] == "M") {
      $("#male").prop("checked", true);
    } else {
      $("#female").prop("checked", true);
    }
  });
}

function load_all_professions() {
  $.ajax({
    url: "/igbj/get_all_professions",
    method: "POST",
    success: function (data) {
      updateProfessionOptions(data);
    },
  });
}
function updateProfessionOptions(data) {
  let select_profession = $("#profession");
  select_profession.empty();
  select_profession.append(
    $("<option>").attr("value", "").text("Seleccione una opción")
  );
  $.each(data, function (index, value) {
    let option = $("<option>")
      .attr("value", value["CODPROFESION"])
      .text(value["PROFESION"]);
    select_profession.append(option);
  });
}

function updateCIExpeditionOptions() {
  let select_ci_expedition = $("#ci_expedition");
  select_ci_expedition.empty();
  select_ci_expedition.append(
    $("<option>").attr("value", "").text("Seleccione una opción")
  );
  let data = {
    CB: "Cochabamba",
    LP: "La Paz",
    OR: "Oruro",
    PT: "Potosí",
    TJ: "Tarija",
    SC: "Santa Cruz",
    BE: "Beni",
    PD: "Pando",
    CH: "Chuquisaca",
  };

  $.each(data, function (index, value) {
    let option = $("<option>").attr("value", index).text(value);
    select_ci_expedition.append(option);
  });
}
