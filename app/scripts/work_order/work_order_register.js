$(document).ready(function () {
  let $cod_activo = document.querySelector("#cod_activo");
  let $resp_activo = document.querySelector("#resp_activo");

  function cargar_responsable() {
    $.ajax({
      url: "/igbj/obtener_personal",
      type: "GET",
      success: function (response) {
        const resposable = JSON.parse(response);
        let templete =
          '<option class="form-control" selected  disabled>Seleccione el responsable</option>';
        console.log(resposable);
        resposable.forEach((resposable) => {
          templete += `<option value="${resposable.cod_acp}">${resposable.nombres} ${resposable.apa} ${resposable.ama} - ${resposable.cargo}</option>`;
        });
        $resp_activo.innerHTML = templete;
      },
    });
  }
  cargar_responsable();

  function carga_activo(send_dato) {
    $.ajax({
      type: "POST",
      url: "/igbj/obtener_clase",
      data: send_dato,
      success: function (response) {
        const activos = JSON.parse(response);
        let templete =
          '<option class="form-control" selected  disabled>Seleccione la clase</option>';
        console.log(activos);
        activos.forEach((activos) => {
          templete += `<option value="${activos.cod_activo}">${activos.cod_activo} - ${activos.descripcion}</option>`;
        });
        $cod_activo.innerHTML = templete;
      },
    });
  }
  
  $resp_activo.addEventListener("change", function () {
    const id_cod = $resp_activo.value;
    const send_dato = {
      cod_acp: id_cod,
    };
    carga_activo(send_dato);
  });
});

document.getElementById("des_sintomas").addEventListener("input", function () {
  this.value = this.value.replace(/[^a-zA-Z0-9\s]+/g, "");
});
