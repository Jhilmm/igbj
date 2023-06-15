$(document).ready(function () {
  var $searchBar = $("#search-bar");
  setTimeout(function () {
    $searchBar.trigger("click");
  }, 1000);
  $searchBar.on("input click", function () {
    let searchValue = $(this).val();
    $.ajax({
      url: "/igbj/technician_assign_search",
      method: "POST",
      data: {
        search_term: searchValue,
      },
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
    tr.append($("<td>").text(value["CODITEM"]));
    tr.append($("<td>").text(value["NOMBRE_COMPLETO"]));
    tr.append($("<td>").text(value["CARGO"]));
    tr.append(
      $("<td>").html(
        $("<button>")
          .text("Asignar")
          .click(function () {
            asign_tec_of_center(
              localStorage.getItem("center_id"),
              value["CODASIGCARGOPER"]
            );
          })
      )
    );
    table.append(tr);
  });
}

function asign_tec_of_center(center_id, assign_id) {
  $.ajax({
    url: "/igbj/assign_technician_center",
    method: "POST",
    data: { center_id: center_id, assign_id: assign_id },
    dataType: "json",
    success: function (data) {
      window.location.href = "/igbj/ver_tecnicos_centro_mantenimiento";
    },
  });
}
