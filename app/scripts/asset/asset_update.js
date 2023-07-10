$(document).ready(function () {
    let $clase2 = document.querySelector("#clase2");
    let $marca2 = document.querySelector("#marca2");
    let $modelo2 = document.querySelector("#modelo2");

    let $clase = document.querySelector("#clase");
    let $marca = document.querySelector("#marca");
    let $modelo = document.querySelector("#modelo");
  
    function cargar_clase() {
      $.ajax({
        url: "/igbj/obtener_clase",
        type: "GET",
        success: function (response) {
          const resposable = JSON.parse(response);
          let templete =
            '<option class="form-control" selected  disabled>Seleccione la clase</option>';
          console.log(resposable);
          resposable.forEach((resposable) => {
            if($clase2.value == resposable.CODCLASE){
              templete += `<option selected value="${resposable.CODCLASE}">${resposable.CLASE}</option>`;
            }else{
              templete += `<option value="${resposable.CODCLASE}">${resposable.CLASE}</option>`;
            }
          });
          $clase.innerHTML = templete;
        },
      });
    }
    cargar_clase();

    function carga_marca2() {
      $.ajax({
        url: "/igbj/obtener_marca2",
        type: "GET",
        success: function (response) {
          const activos = JSON.parse(response);
          let templete =
            '<option class="form-control" selected  disabled>Seleccione la marca</option>';
          console.log(activos);
          activos.forEach((activos) => {
            if($marca2.value == activos.CODMARCA){
              templete += `<option selected value="${activos.CODMARCA}">${activos.MARCA}</option>`;
            }else{
              templete += `<option value="${activos.CODMARCA}">${activos.MARCA}</option>`;
            }
          });
          $marca.innerHTML = templete;
        },
      });
    }

    carga_marca2();

    function carga_marca(send_dato) {
        $.ajax({
          type: "POST",
          url: "/igbj/obtener_marca",
          data: send_dato,
          success: function (response) {
            const activos = JSON.parse(response);
            let templete =
              '<option class="form-control" selected  disabled>Seleccione la marca</option>';
            console.log(activos);
            activos.forEach((activos) => {
              templete += `<option value="${activos.CODMARCA}">${activos.MARCA}</option>`;
            });
            $marca.innerHTML = templete;
          },
        });
    }

    function carga_modelo2() {
      $.ajax({
        type: "GET",
        url: "/igbj/obtener_modelo2",
        success: function (response) {
          const activos = JSON.parse(response);
          let templete =
            '<option class="form-control" selected  disabled>Seleccione el modelo</option>';
          console.log(activos);
          activos.forEach((activos) => {
              if(activos.CODMODELO == $modelo2.value){
                  templete += `<option selected value="${activos.CODMODELO}">${activos.MODELO}</option>`;
              }else{
                  templete += `<option value="${activos.CODMODELO}">${activos.MODELO}</option>`;
              }
              
          });
          $modelo.innerHTML = templete;
        },
      });
    }

    carga_modelo2();

    function carga_modelo(send_dato) {
        $.ajax({
          type: "POST",
          url: "/igbj/obtener_modelo",
          data: send_dato,
          success: function (response) {
            const activos = JSON.parse(response);
            let templete =
              '<option class="form-control" selected  disabled>Seleccione el modelo</option>';
            console.log(activos);
            activos.forEach((activos) => {

                  templete += `<option value="${activos.CODMODELO}">${activos.MODELO}</option>`;
                
            });
            $modelo.innerHTML = templete;
          },
        });
    }
    
    $clase.addEventListener("change", function () {
      const codigoCe = $clase.value;
      const send_dato = {
        codigoC: codigoCe,
      };
      carga_marca(send_dato);
    });
 

    $marca.addEventListener("change", function () {
    const codigoM = $marca.value;
    const send_dato = {
      codigoMo: codigoM,
    };
        carga_modelo(send_dato);
    });

});
  
  document.getElementById("des_sintomas").addEventListener("input", function () {
    this.value = this.value.replace(/[^a-zA-Z0-9\s]+/g, "");
  });
  