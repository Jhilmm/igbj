$(document).ready(function () {
  var $searchBar = $("#search-bar");
  setTimeout(function () {
    $searchBar.trigger("click");
  }, 1000);
  $searchBar.on("input click", function () {
    let searchValue = $(this).val();
    $.ajax({
      url: baseURL + "/technician_center_search",
      method: "POST",
      data: {
        center_id: localStorage.getItem("center_id"),
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
    tr.append($("<td>").text(value["CARGO"]));
    tr.append($("<td>").text(value["NOMBRES"]));
    tr.append($("<td>").text(value["CELULAR"]));
    if (value["ESTADO"] == 1) {
      tr.append(
        $("<td>").html(
          $("<button>")
            .text("Desactivar")
            .click(function () {
              enable_disable(
                value["CODTECNICO"],
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
              enable_disable(
                value["CODTECNICO"],
                value["ESTADO"]
              );
            })
        )
      );
    }
    table.append(tr);
  });
}

function enable_disable($id, $state) {
  $.ajax({
    url: baseURL + "/technician_center_enable_disable",
    method: "POST",
    data: { row_id: $id, state: $state },
    dataType: "json",
    success: function (data) {
      location.reload();
    },
  });
}
