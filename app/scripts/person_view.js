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
    tr.append($("<td>").text(value.last_name1));
    tr.append($("<td>").text(value.last_name2));
    tr.append($("<td>").text(value.first_name));
    tr.append($("<td>").text(value.id_number));
    tr.append($("<td>").text(value.birthdate));
    tr.append($("<td>").text(value.profession));
    tr.append($("<td>").text(value.address));
    tr.append($("<td>").text(value.phone));
    tr.append($("<td>").text(value.mobile));
    tr.append($("<td>").text(value.email));
    tr.append($("<td>").text(value.gender));
    tr.append(
      $("<td>").html("<a href='person_edit.php?id=" + value.id + "'>Editar</a>")
    );
    tr.append(
      $("<td>").html(
        "<a href='person_assign_item.php?id=" + value.id + "'>Asignar Item</a>"
      )
    );
    tr.append(
      $("<td>").html(
        "<a href='person_assign_position.php?id=" +
          value.id +
          "'>Asignar Posición</a>"
      )
    );
    table.append(tr);
  });
}
