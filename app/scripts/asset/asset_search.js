$(document).ready(function () {
    let $busqueda = document.querySelector("#busqueda");
    let $tabla = document.querySelector("#tabla2");

    function vista() {
      $.ajax({
        url: "/igbj/vista_repuesto",
        type: "GET",
        success: function (response) {
          const repuesto = JSON.parse(response);
          let templete = ``;
          console.log(repuesto);
          repuesto.forEach((repuesto) => {
                templete += `<tr>`;
                templete += `<td>${repuesto.NOMREPUESTO}'</td>`;
                templete += `<td>${repuesto.DETALLEREPUESTO}'</td>`;
                templete += `<td>${repuesto.NOMTIPOREPUESTO}'</td>`;
                templete += `<td>${repuesto.FECHA}'</td>`;
                templete += `<td>${repuesto.MARCA}'</td>`;
                templete += `<td>${repuesto.MODELO}'</td>`;
                templete += `<td>${repuesto.CANTIDAD}'</td>`;
                templete += `</tr>`;
          });
          $tabla.innerHTML = templete;
        },
      });
    }
    vista();

    function $busquedar(send_dato) {
        $.ajax({
          type: "POST",
          url: "/igbj/busqueda_repuesto",
          data: send_dato,
          success: function (response) {
            const repuesto = JSON.parse(response);
            let templete = ``;
            console.log(repuesto);
            repuesto.forEach((repuesto) => {
                templete += `<tr>`;
                templete += `<td>${repuesto.NOMREPUESTO}'</td>`;
                templete += `<td>${repuesto.DETALLEREPUESTO}'</td>`;
                templete += `<td>${repuesto.NOMTIPOREPUESTO}'</td>`;
                templete += `<td>${repuesto.FECHA}'</td>`;
                templete += `<td>${repuesto.MARCA}'</td>`;
                templete += `<td>${repuesto.MODELO}'</td>`;
                templete += `<td>${repuesto.CANTIDAD}'</td>`;
                templete += `</tr>`;
            });
            $tabla.innerHTML = templete;
          },
        });
    }

    $busqueda.addEventListener("keyup", function () {
    const repuesto = $busqueda.value;
    const send_dato = {
      repuesto: repuesto,
    };
        $busquedar(send_dato);
    });

});