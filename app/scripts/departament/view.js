$(document).ready(function () {
  let buscar = document.getElementById("text");
  let table = document.getElementById("table-body");

  function search(send_dato) {
    $.ajax({
      type: "POST",
      url: baseURL + "/departamento_search",
      data: send_dato,
      success: function (response) {
        console.log(response);
        const datos = JSON.parse(response);

        while (table.firstChild) {
          table.firstChild.remove();
        }
        datos.forEach((dato) => {
          let fila = document.createElement("tr");

          //PRIMER CELDA DE NOMBRE DE DEPARTAMENTOS
          let celda1 = document.createElement("td");
          celda1.textContent = dato["NOMBDEPARTAMENTO"];
          fila.appendChild(celda1);

          //SEGUNDA CELDA DE DESCRIPCION DE DEPARTAMENTOS
          let celda2 = document.createElement("td");
          celda2.textContent = dato["DESCRIPCION"];
          fila.appendChild(celda2);

          //TERCERA CELDA DE ESTADO HABILITADO O DESAHABILITADO DE DEPARTAMENTOS
          let celda3 = document.createElement("td");
          if (dato["ESTADO"] == 1) {
            celda3.textContent = "HABILITADO";
          } else {
            celda3.textContent = "DESHABILITADO";
          }
          fila.appendChild(celda3);

          //CUARTA CELDA DE LAS ACCIONES O BOTONES
          let celda4 = document.createElement("td");
          celda4.classList.add("acciones");

          //ICONO DE MODIFICAR
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
            "actualizar_departamento_formulario?departamento=" +
            dato["NOMBDEPARTAMENTO"];
          enlaceModificar.classList.add("fas", "fa-pen", "align-self-center");
          divModificar.appendChild(enlaceModificar);
          celda4.appendChild(divModificar);

          //ICONO DE HABLITAR O DESAHABILITAR
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
              baseURL +
              "deshabilitar_departamento?departamento=" +
              dato["NOMBDEPARTAMENTO"];
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
              baseURL +
              "habilitar_departamento?departamento=" +
              dato["NOMBDEPARTAMENTO"];
            enlaceEstado.classList.add("fas", "fa-lock", "align-self-center");
          }
          divEstado.appendChild(enlaceEstado);
          celda4.appendChild(divEstado);

          fila.appendChild(celda4);

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
