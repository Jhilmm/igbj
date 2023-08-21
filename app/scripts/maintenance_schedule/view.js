$(document).ready(function () {
  let combo_departamento = document.getElementById("departamento");
  let combo_activo = document.getElementById("activo");
  let table = document.getElementById("table-body");

  function cargarDepartamentos() {
    $.ajax({
      type: "GET",
      url: baseURL + "/cargar_departamentos",
      success: function (response) {
        const departamentos = JSON.parse(response);

        let option = document.createElement("option");
        option.textContent = "TODOS";
        option.setAttribute("value", "");
        option.setAttribute("selected", "selected");
        combo_departamento.appendChild(option);
        departamentos.forEach((departamento) => {
          let option = document.createElement("option");
          let departamentoNombre = departamento["NOMBDEPARTAMENTO"];
          option.value = departamento["CODDEPARTAMENTO"];
          option.textContent = capitalizarCadena(departamentoNombre);
          combo_departamento.appendChild(option);
        });
      },
    });
  }

  function cargar_activos() {
    $.ajax({
      type: "GET",
      url: baseURL + "/cargar_activos",
      success: function (response) {
        const activos = JSON.parse(response);
        let option = document.createElement("option");
        option.textContent = "TODOS";
        option.setAttribute("value", "");
        option.setAttribute("selected", "selected");
        combo_activo.appendChild(option);
        activos.forEach((activo) => {
          let option = document.createElement("option");
          option.value = activo["CODCLASE"];
          option.textContent = activo["CLASE"];
          combo_activo.appendChild(option);
        });
      },
    });
  }

  function cargarTabla(send_dato) {
    $.ajax({
      type: "POST",
      url: baseURL + "/cronogramas_preventivos",
      data: send_dato,
      success: function (response) {
        console.log(response);
        const cronogramas = JSON.parse(response);
        while (table.firstChild) {
          table.firstChild.remove();
        }
        let i = 1;
        cronogramas.forEach((cronograma) => {
          let fila = document.createElement("tr");

          //PRIMERA CELDA NRO
          let celda1 = document.createElement("td");
          celda1.textContent = i;
          fila.appendChild(celda1);

          //SEGUNDA CELDA DEPARTAMENTO
          let celda2 = document.createElement("td");
          celda2.textContent = cronograma["NOMBDEPARTAMENTO"].toUpperCase();
          fila.appendChild(celda2);

          //TERCERA CELDA RESPONSABLE
          let celda3 = document.createElement("td");
          celda3.textContent =
            cronograma["ABREVIACION"] +
            " " +
            cronograma["NOMBRES"] +
            " " +
            cronograma["APPATERNO"] +
            " " +
            cronograma["APMATERNO"];
          fila.appendChild(celda3);

          //CUARTA CELDA TIPO ACTIVO
          let celda4 = document.createElement("td");
          celda4.textContent = cronograma["CLASE"];
          fila.appendChild(celda4);

          //QUINTA CELDA CODIGO ACTIVO
          let celda5 = document.createElement("td");
          celda5.textContent = cronograma["CODACTIVO"];

          fila.appendChild(celda5);

          //SEXTA CELDA DESCRIPCION
          let celda6 = document.createElement("td");
          celda6.textContent = cronograma["DESCRIPCION"].toUpperCase();
          fila.appendChild(celda6);

          //OCTAVA CELDA CATALOGOS
          let celda7 = document.createElement("td");
          celda7.textContent = cronograma["NOMCATALOGO"];
          fila.appendChild(celda7);

          //SEPTIMA CELDA FECHA INPUT
          let celda8 = document.createElement("td");
          celda8.classList.add("celda_form");
          if (cronograma["FECHASALIDA"] === null) {
            let form = document.createElement("form");
            let actionUrl = baseURL + "guardar_cronograma";
            let methodType = "POST";
            form.setAttribute("action", actionUrl);
            form.setAttribute("method", methodType);
            form.classList.add("celda_form");

            let codigoActivo = document.createElement("input");
            codigoActivo.type = "text";
            codigoActivo.name = "codigoActivo";
            codigoActivo.value = cronograma["CODACTIVO"];
            codigoActivo.setAttribute("hidden", true);
            form.appendChild(codigoActivo);

            let fecha = document.createElement("input");
            fecha.type = "date";
            fecha.name = "fecha";
            fecha.classList.add("form-control");
            fecha.setAttribute("required", true);
            form.appendChild(fecha);

            let guardar = document.createElement("button");
            guardar.type = "submit";
            guardar.classList.add("btn", "btn-success");
            guardar.textContent = "Guardar";
            form.appendChild(guardar);
            celda8.appendChild(form);
          } else {
            celda8.textContent = cronograma["FECHASALIDA"];
            let borrar = document.createElement("a");
            borrar.textContent = "Borrar";
            borrar.classList.add("btn", "btn-danger");
            borrar.href = baseURL + "borrar_cronograma?cronograma=" +
            cronograma["CODCRONOGRAMA"];;

            celda8.appendChild(borrar);
          }
          fila.appendChild(celda8);
          i = i + 1;
          table.appendChild(fila);
        });
      },
    });
  }
  function capitalizarCadena(cadena) {
    return cadena.charAt(0).toUpperCase() + cadena.slice(1).toLowerCase();
  }
  cargarDepartamentos();
  cargar_activos();

  let send_dato = {
    departamento: combo_departamento.value,
    activo: combo_activo.value,
  };

  cargarTabla(send_dato);

  combo_departamento.addEventListener("change", function () {
    send_dato = {
      departamento: combo_departamento.value,
      activo: combo_activo.value,
    };
    cargarTabla(send_dato);
  });
  combo_activo.addEventListener("change", function () {
    send_dato = {
      departamento: combo_departamento.value,
      activo: combo_activo.value,
    };
    cargarTabla(send_dato);
  });
});
