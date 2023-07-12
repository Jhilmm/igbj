$(document).ready(function () {
    let $busqueda = document.querySelector("#busqueda");
    let $tabla = document.querySelector("#tabla");

    function vista() {
      $.ajax({
        url: "/igbj/vista_activo",
        type: "GET",
        success: function (response) {
          const repuesto = JSON.parse(response);
          let templete = ``;
          console.log(repuesto);
          repuesto.forEach((repuesto) => {

            templete += `<tr>`;
            templete += `<td>${repuesto.CLASE}</td>`;
            templete += `<td>${repuesto.MARCA}</td>`;
            templete += `<td>${repuesto.MODELO}</td>`;
            templete += `<td>${repuesto.PROCEDENCIA}</td>`;
            templete += `<td><center><img height="108px" width="192px" src="data:image/png;base64,${repuesto.FOTOGRAFIA}"></center></td>`;
            
            templete += `<td>${repuesto.ANIOFABRICACION}</td>`;
                //ESTADO
                templete += `<td>`;
                if(repuesto.ESTADOACTIVO == 1){
                  templete += `<span>HABILITADO</span>`;
                }else{
                  templete += `<span>DESHABILITADO</span>`;
                }
                templete += `</td>`;

                //ACCIONES
                templete += `<td class="acciones">`;

                templete += `<div class="icons modificar d-flex justify-content-center">`;
                templete += `<a href="/igbj/modificar_activo?codigo=${repuesto.CODACTIVO}" class="fas fa-pen align-self-center"></a>`;
                templete += `</div>`;

                if(repuesto.ESTADOACTIVO == 1){
                  templete += `<div class="icons deshabilitar d-flex justify-content-center">`;
                  templete += `<a href="/igbj/deshabilitar_activo?codigo=${repuesto.CODACTIVO}" class="fas fa-lock-open align-self-center"></a>`;
                  templete += `</div>`;
                }else{
                  templete += `<div class="icons habilitar d-flex justify-content-center">`;
                  templete += `<a href="/igbj/habilitar_activo?codigo=${repuesto.CODACTIVO}" class="fas fa-lock align-self-center"></a>`;
                  templete += `</div>`;
                }

                templete += `</td>`;
                //FIN ACCIONES


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
          url: "/igbj/busqueda_activo",
          data: send_dato,
          success: function (response) {
            const repuesto = JSON.parse(response);
            let templete = ``;
            console.log(repuesto);
            repuesto.forEach((repuesto) => {
                templete += `<tr>`;
            templete += `<td>${repuesto.CLASE}</td>`;
            templete += `<td>${repuesto.MARCA}</td>`;
            templete += `<td>${repuesto.MODELO}</td>`;
            templete += `<td>${repuesto.PROCEDENCIA}</td>`;
            templete += `<td><center><img height="108px" width="192px" src="data:image/png;base64,${repuesto.FOTOGRAFIA}"></center></td>`;
            templete += `<td>${repuesto.ANIOFABRICACION}</td>`;
                //ESTADO
                templete += `<td>`;
                if(repuesto.ESTADOACTIVO == 1){
                  templete += `<span>HABILITADO</span>`;
                }else{
                  templete += `<span>DESHABILITADO</span>`;
                }
                templete += `</td>`;

                //ACCIONES
                templete += `<td class="acciones">`;

                templete += `<div class="icons modificar d-flex justify-content-center">`;
                templete += `<a href="/igbj/modificar_activo?codigo=${repuesto.CODACTIVO}" class="fas fa-pen align-self-center"></a>`;
                templete += `</div>`;

                if(repuesto.ESTADOACTIVO == 1){
                  templete += `<div class="icons deshabilitar d-flex justify-content-center">`;
                  templete += `<a href="/igbj/deshabilitar_activo?codigo=${repuesto.CODACTIVO}" class="fas fa-lock-open align-self-center"></a>`;
                  templete += `</div>`;
                }else{
                  templete += `<div class="icons habilitar d-flex justify-content-center">`;
                  templete += `<a href="/igbj/habilitar_activo?codigo=${repuesto.CODACTIVO}" class="fas fa-lock align-self-center"></a>`;
                  templete += `</div>`;
                }

                templete += `</td>`;
                //FIN ACCIONES


                templete += `</tr>`;
            });
            $tabla.innerHTML = templete;
          },
        });
    }

    $busqueda.addEventListener("keyup", function () {
    const activo = $busqueda.value;
    const send_dato = {
        activo: activo,
    };
        $busquedar(send_dato);
    });

});
