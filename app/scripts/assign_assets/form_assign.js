$(document).ready(function () {
  let searchValue = $(this).val();
  $.ajax({
    url: "/igbj/search_responsible_personnel_with_asset_assignment",
    method: "POST",
    data: { search_term: searchValue },
    dataType: "json",
    success: function (data) {
      load_personnel(data);
      console.log(localStorage);
    },
  });
  let $searchBar = $("#personnel");
  $searchBar.on("change", function () {
    console.log("cambio");
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
