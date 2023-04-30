$(document).ready(function () {
  var $searchBar = $("#search-bar");
  setTimeout(function () {
    $searchBar.trigger("click");
  }, 1000);
  $searchBar.on("input click", function () {
    var searchValue = $(this).val();
    $.ajax({
      url: "/igbj/person_search",
      method: "POST",
      data: { searchValue: searchValue },
      dataType: "json",
      success: function (data) {
        console.log(data);
        updateTable(data);
      },
    });
  });
});

function updateTable(data) {
  var table = $("#person-table-body");
  table.empty();
  $.each(data, function (index, value) {
    var tr = $("<tr>");
    tr.append($("<td>").text(value["APPATERNO"]));
    tr.append($("<td>").text(value["APMATERNO"]));
    tr.append($("<td>").text(value["NOMBRES"]));
    tr.append($("<td>").text(value["CI"] + " " + value["EXPEDIDOCI"]));
    tr.append($("<td>").text(value["FECHANACIMIENTO"]));
    tr.append($("<td>").text(value["PROFESION"]));
    tr.append($("<td>").text(value["DIRECCION"]));
    tr.append($("<td>").text(value["TELEFONO"]));
    tr.append($("<td>").text(value["CELULAR"]));
    tr.append($("<td>").text(value["CORREO"]));
    tr.append($("<td>").text(value["SEXO"]));
    tr.append(
      $("<td>").html(
        "<a href='person_edit.php?id=" + value["CI"] + "'>Editar</a>"
      )
    );
    tr.append(
      $("<td>").html(
        "<a href='person_assign_item.php?id=" +
          value["CI"] +
          "'>Asignar Item</a>"
      )
    );
    tr.append(
      $("<td>").html(
        "<a href='person_assign_position.php?id=" +
          value["id"] +
          "'>Asignar Posición</a>"
      )
    );
    table.append(tr);
  });
}
