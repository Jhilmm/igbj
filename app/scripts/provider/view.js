$(document).ready(function () {
  let buscar = document.getElementById("text");
  let table = document.getElementById("table-body");

  function search(send_dato) {
    $.ajax({
      type: "POST",
      url: baseURL + "/proveedor_search",
      data: send_dato,
      success: function (response) {
        console.log(response);
        const datos = JSON.parse(response);

        while (table.firstChild) {
          table.firstChild.remove();
        }

        datos.forEach((dato) => {
          let fila = document.createElement("tr");

          //primera celda NIT

          let celda1 = document.createElement("td");
          celda1.textContent = dato["NIT"];
          fila.appendChild(celda1);

          //segunda celda PROVEEDOR
          let celda2 = document.createElement("td");
          celda2.textContent = dato["NOMPROVEEDOR"];
          fila.appendChild(celda2);

          //tercera celda DIRECCION
          let celda3 = document.createElement("td");
          celda3.textContent = dato["DIRECCION"];
          fila.appendChild(celda3);

          //cuarta celda Telefono del proveedor
          let celda4 = document.createElement("td");
          celda4.textContent = dato["TELEFONOPROVEEDOR"];
          fila.appendChild(celda4);

          //quinta celda Contacto
          let celda5 = document.createElement("td");
          celda5.textContent = dato["CONTACTO"];
          fila.appendChild(celda5);

          //sexta celda celular del contacto
          let celda6 = document.createElement("td");
          celda6.textContent = dato["CELULARCONTACTO"];
          fila.appendChild(celda6);

          //septima celda correo del contacto
          let celda7 = document.createElement("td");
          celda7.textContent = dato["CORREOCONTACTO"];
          fila.appendChild(celda7);

          //octava celda Estado Habilitado/Desahabilitado
          let celda8 = document.createElement("td");
          if (dato["ESTADO"] == 1) {
            celda8.textContent = "HABILITADO";
          } else {
            celda8.textContent = "DESHABILITADO";
          }
          fila.appendChild(celda8);

          //novena celda acciones/botonoes/iconos
          let celda9 = document.createElement("td");
          celda9.classList.add("acciones");

          //icono modificar
          let divModificar = document.createElement("div");
          divModificar.classList.add(
            "icons",
            "modificar",
            "d-flex",
            "justify-content-center"
          );
          let enlaceModificar = document.createElement("a");
          enlaceModificar.href =
            baseURL +
            "actualizar_proveedor_formulario?proveedor=" +
            dato["NIT"];
          enlaceModificar.classList.add("fas", "fa-pen", "aling-self-center");
          divModificar.appendChild(enlaceModificar);
          celda9.appendChild(divModificar);

          //icono habilitar*deshabilitar
          let divEstado = document.createElement("div");
          let enlaceEstado = document.createElement("a");
          if (dato["ESTADO"] == 1) {
            divEstado.classList.add(
              "icons",
              "deshabilitar",
              "d-flex",
              "justify-content-center"
            );
            enlaceEstado.href =
              baseURL + "deshabilitar_proveedor?proveedor=" + dato["NIT"];
            enlaceEstado.classList.add(
              "fas",
              "fa-lock-open",
              "align-self-center"
            );
          } else {
            divEstado.classList.add(
              "icons",
              "habilitar",
              "d-flex",
              "justify-content-center"
            );
            enlaceEstado.href =
              baseURL + "/habilitar_proveedor?proveedor=" + dato["NIT"];
            enlaceEstado.classList.add("fas", "fa-lock", "align-self-center");
          }
          divEstado.appendChild(enlaceEstado);
          celda9.appendChild(divEstado);

          fila.appendChild(celda9);

          table.appendChild(fila);
        });
      },
    });
  }
  let send_dato = {
    send_dato: "",
  };
  search(send_dato);
  buscar.addEventListener("input", function () {
    send_dato = {
      send_dato: buscar.value,
    };
    search(send_dato);
  });
});
