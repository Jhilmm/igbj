$(document).ready(function () {
  var $searchBar = $("#search-bar");
  setTimeout(function () {
    $searchBar.trigger("click");
  }, 1000);
  $searchBar.on("input click", function () {
    var searchValue = $(this).val();
    $.ajax({
      url: "/igbj/personnel_search",
      method: "POST",
      data: { search_term: searchValue },
      dataType: "json",
      success: function (data) {
        updateDepartmentOptions(data);
      },
    });
  });
});

function updateDepartmentOptions(data) {
  var table = $("#table-body");
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
        $("<button>")
          .text("Editar")
          .click(function () {
            localStorage.clear();
            localStorage.setItem("person_id", value["CI"]);
            window.location.href = "/igbj/actualizar_persona";
          })
      )
    );
    $.ajax({
      url: "/igbj/has_item_assigned",
      method: "POST",
      data: { num_ci: value["CI"] },
      dataType: "json",
      success: function (data) {
        var res = JSON.parse(JSON.stringify(data))[0];
        if (res && res.hasItem === true) {
          tr.append(
            $("<td>").html(
              $("<button>")
                .text("Actualizar Item")
                .click(function () {
                  localStorage.clear();
                  localStorage.setItem("person_id", value["CI"]);
                  localStorage.setItem(
                    "person_name",
                    value["NOMBRES"] +
                      " " +
                      value["APPATERNO"] +
                      " " +
                      value["APMATERNO"]
                  );
                  localStorage.setItem("personnel_id", res.CODPERSONAL);
                  localStorage.setItem("item_id", res.CODITEM);
                  localStorage.setItem("date", res.FECHAASIGNACION);
                  window.location.href = "/igbj/cambiar_item_asignado";
                })
            )
          );
          $.ajax({
            url: "/igbj/has_position_assigned",
            method: "POST",
            data: { num_ci: value["CI"] },
            dataType: "json",
            success: function (data) {
              var position = JSON.parse(JSON.stringify(data))[0];
              if (position && position.hasPosition === true) {
                tr.append(
                  $("<td>").html(
                    $("<button>")
                      .text("Actualizar Cargo")
                      .click(function () {
                        localStorage.clear();
                        localStorage.setItem(
                          "assign_position_id",
                          position.CODASIGCARGOPER
                        );
                        localStorage.setItem(
                          "person_name",
                          value["NOMBRES"] +
                            " " +
                            value["APPATERNO"] +
                            " " +
                            value["APMATERNO"]
                        );
                        localStorage.setItem("item_id", position.CODITEM);
                        window.location.href = "/igbj/actualizar_cargo";
                      })
                  )
                );
              } else {
                tr.append(
                  $("<td>").html(
                    $("<button>")
                      .text("Asignar Cargo")
                      .click(function () {
                        localStorage.clear();
                        localStorage.setItem("person_id", value["CI"]);
                        localStorage.setItem(
                          "person_name",
                          value["NOMBRES"] +
                            " " +
                            value["APPATERNO"] +
                            " " +
                            value["APMATERNO"]
                        );
                        localStorage.setItem("personnel_id", res.CODPERSONAL);
                        localStorage.setItem("item_id", res.CODITEM);
                        window.location.href = "/igbj/asignar_cargo";
                      })
                  )
                );
              }
            },
          });
        } else {
          tr.append(
            $("<td>").html(
              $("<button>")
                .text("Asignar Item")
                .click(function () {
                  localStorage.clear();
                  localStorage.setItem("person_id", value["CI"]);
                  localStorage.setItem(
                    "person_name",
                    value["NOMBRES"] +
                      " " +
                      value["APPATERNO"] +
                      " " +
                      value["APMATERNO"]
                  );
                  window.location.href = "/igbj/asignar_item";
                })
            )
          );
        }
      },
    });
    table.append(tr);
  });
}
