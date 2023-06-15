$(document).ready(function () {
  let $submit_btn = $("#btn-send");
  $submit_btn.on("click", function (event) {
    event.preventDefault();
    let formulario = $("#form");
    let item = $("#item");
    item.click();
    let date = $("#date");
    date.click();
    if (!item.hasClass("is-invalid") && !date.hasClass("is-invalid")) {
      let val = localStorage.getItem("personnel_id");
      $.ajax({
        url: "/igbj/update_item_assigned",
        type: "POST",
        data: formulario.serializeArray().concat([
          {
            name: "personnel_id",
            value: val,
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
  load_all_items();
  load_person_information();
  validate_item();
  validate_date();
});

function load_person_information() {
  $("#num_ci").val(localStorage.getItem("person_id"));
  $("#name").val(localStorage.getItem("person_name"));
  if (localStorage.getItem("date")) {
    const dateValue = new Date(localStorage.getItem("date"));
    if (!isNaN(dateValue)) {
      $("#date").val(dateValue.toISOString().substring(0, 10));
    }
  }
}

function load_all_items() {
  $.ajax({
    url: "/igbj/get_all_items",
    method: "POST",
    success: function (data) {
      update(data);
    },
  });
}
function update(data) {
  let elem_select = $("#item");
  elem_select.empty();
  elem_select.append(
    $("<option>").attr("value", "").text("Seleccione una opción")
  );
  elem_select.append(
    $("<option>").attr("value", localStorage.getItem("item_id")).text("TIENES ASIGNADO EL ITEM: "+localStorage.getItem("item_id"))
      .prop("selected", true)
  );
  $.each(data, function (index, value) {
    let option = $("<option>")
      .attr("value", value["CODITEM"])
      .text("ITEM DISPONIBLE:  " + value["CODITEM"]);
    elem_select.append(option);
  });
}

function validate_item() {
  const $input = $("#item");
  const $feedback = $("#item-feedback");
  $input.on("input click", function () {
    const selectedValue = $input.val();
    if (selectedValue === "") {
      $feedback.show();
      $input.addClass("is-invalid");
    } else {
      $feedback.hide();
      $input.removeClass("is-invalid");
    }
  });
}

function validate_date() {
  const $input = $("#date");
  const $feedback = $("#date-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    const selectedDate = new Date($value);
    const minDate = new Date();
    const maxDate = new Date();
    maxDate.setDate(minDate.getDate() + 10);
    minDate.setDate(minDate.getDate() - 10);
    if (selectedDate >= minDate && selectedDate <= maxDate) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}
