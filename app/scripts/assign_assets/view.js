$(document).ready(function () {
  let $searchBarResponsible = $("#search_responsible-bar");
  setTimeout(function () {
    $searchBarResponsible.trigger("click");
  }, 1000);
  $searchBarResponsible.on("input click", function () {
    let searchValue = $(this).val();
    $.ajax({
      url: baseURL + "/search_responsible_personnel_with_asset_assignment",
      method: "POST",
      data: { search_term: searchValue },
      dataType: "json",
      success: function (data) {
        load_personnel(data);
      },
    });
  });
  let $miSelect = $("#personnel");
  $miSelect.on("change", function () {
    let cod_asign_cargo_per = $(this).find(":selected").attr("value");
    if (cod_asign_cargo_per != "") {
      localStorage.setItem("cod_asign_cargo_per", cod_asign_cargo_per);
      setTimeout(function () {
        $("#search-bar").trigger("click");
      }, 1000);
    } else {
      $("#table-body").empty();
    }
  });
  let $searchBar = $("#search-bar");
  $searchBar.on("input click", function () {
    let searchValue = $(this).val();
    $.ajax({
      url: baseURL + "/search_assigned_assets",
      method: "POST",
      data: {
        search_term: searchValue,
        cod_assign_cargo_personnel: localStorage.getItem("cod_asign_cargo_per"),
      },
      dataType: "json",
      success: function (data) {
        console.log(data);
        update(data);
      },
    });
  });
});
function load_personnel(data) {
  let input_select = $("#personnel");
  input_select.empty();
  input_select.append(
    $("<option>").attr("value", "").text("Seleccione una opción")
  );
  $.each(data, function (index, value) {
    let option = $("<option>")
      .attr("value", value["CODASIGCARGOPER"])
      .text(
        value["NOMBRE_COMPLETO"] +
          " " +
          value["CARGO"] +
          " de " +
          value["NOMBDEPARTAMENTO"]
      );
    input_select.append(option);
  });
}

function update(data) {
  let table = $("#table-body");
  table.empty();
  $.each(data, function (index, value) {
    let tr = $("<tr>");
    tr.append($("<td>").text(value["CODACTIVO"]));
    tr.append($("<td>").text(value["DESCRIPCION"]));
    tr.append($("<td>").text(value["CLASE"]));
    tr.append($("<td>").text(value["MARCA"]));
    tr.append($("<td>").text(value["MODELO"]));
    tr.append($("<td>").text(value["SERIE"]));
    tr.append(
      $("<td>").html(
        `<input type="checkbox" class="activo-checkbox" value="${value["CODACTIVO"]}">`
      )
    );

    tr.append(
      $("<td>").html(
        $("<button>")
          .text("Ver Detalles")
          .click(function () {
            localStorage.clear();
            localStorage.setItem("asset_id", value["CODACTIVO"]);
            window.location.href = baseURL + "/RUTA";
          })
      )
    );

    table.append(tr);
  });
}

$("#assign").click(function () {
  var checkboxes = $(".activo-checkbox:checked");
  var valoresSeleccionados = [];
  checkboxes.each(function () {
    valoresSeleccionados.push($(this).val());
  });
  console.log(valoresSeleccionados);
  console.log("click");
});
