$(document).ready(function () {
  var $searchBar = $("#search-bar");
  setTimeout(function () {
    $searchBar.trigger("click");
  }, 1000);
  $searchBar.on("input click", function () {
    var searchValue = $(this).val();
    $.ajax({
      url: baseURL + "/maintenance_center_search",
      method: "POST",
      data: { search_term: searchValue },
      dataType: "json",
      success: function (data) {
        update(data);
      },
    });
  });
});

function update(data) {
  var table = $("#table-body");
  table.empty();
  $.each(data, function (index, value) {
    var tr = $("<tr>");
    tr.append($("<td>").text(value["CENTROMANTENIMIENTO"]));
    tr.append($("<td>").text(value["DESCRIPCION"]));
    tr.append(
      $("<td>").html(
        $("<button>")
          .text("Editar")
          .click(function () {
            localStorage.clear();
            localStorage.setItem("center_id", value["CODCENTRO"]);
            window.location.href = baseURL + "/actualizar_centro_mantenimiento";
          })
      )
    );
    tr.append(
      $("<td>").html(
        $("<button>")
          .text("ver tecnicos")
          .click(function () {
            localStorage.clear();
            localStorage.setItem("center_id", value["CODCENTRO"]);
            window.location.href =
              baseURL + "/ver_tecnicos_centro_mantenimiento";
          })
      )
    );
    if (value["ESTADO"] == 1) {
      tr.append(
        $("<td>").html(
          $("<button>")
            .text("Desactivar")
            .click(function () {
              enableDisableMaintenanceCenter(
                value["CODCENTRO"],
                value["ESTADO"]
              );
            })
        )
      );
    } else {
      tr.append(
        $("<td>").html(
          $("<button>")
            .text("Activar")
            .click(function () {
              enableDisableMaintenanceCenter(
                value["CODCENTRO"],
                value["ESTADO"]
              );
            })
        )
      );
    }
    table.append(tr);
  });
}
function enableDisableMaintenanceCenter($center_id, $state) {
  $.ajax({
    url: baseURL + "/maintenance_center_enable_disable",
    method: "POST",
    data: { row_id: $center_id, state: $state },
    dataType: "json",
    success: function (data) {
      location.reload();
    },
  });
}
