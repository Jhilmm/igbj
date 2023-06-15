$(document).ready(function () {
  load_all_professions();
  updateCIExpeditionOptions();
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
        url: "/igbj/register_person",
        type: "POST",
        data: formulario.serializeArray(),
        dataType: "text",
        success: function (response, status, xhr) {
          if (xhr.status === 200) {
            alert(response);
            window.location.replace("/igbj/personal");
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