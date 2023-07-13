$(document).ready(function () {
    let $busqueda = document.querySelector("#busqueda");
    let $tabla = document.querySelector("#tabla");
    let $paginador = document.querySelector("#paginador");

    function vista() {
      $.ajax({
        url: "/igbj/vista_cargo",
        type: "GET",
        success: function (response) {
          const repuesto = JSON.parse(response);
          let templete = ``;
          console.log(repuesto);
          let contador = 0;
          repuesto.forEach((repuesto) => {
            templete += `<tr>`;

            templete += `<td>${repuesto.CODCARGO}</td>`;
            templete += `<td>${repuesto.CODDEPARTAMENTO}</td>`;
            templete += `<td>${repuesto.CARGO}</td>`;
            //ESTADO
            templete += `<td>`;
            if(repuesto.ESTADO == 1){
              templete += `<span>HABILITADO</span>`;
            }else{
              templete += `<span>DESHABILITADO</span>`;
            }
            templete += `</td>`;

            //ACCIONES
            templete += `<td class="acciones">`;

            templete += `<div class="icons modificar d-flex justify-content-center">`;
            templete += `<a href="/igbj/modificar_cargo?cargo=${repuesto.CODCARGO}" class="fas fa-pen align-self-center"></a>`;
            templete += `</div>`;

            if(repuesto.ESTADO == 1){
              templete += `<div class="icons deshabilitar d-flex justify-content-center">`;
              templete += `<a href="/igbj/deshabilitar_cargo?cargo=${repuesto.CARGO}" class="fas fa-lock-open align-self-center"></a>`;
              templete += `</div>`;
            }else{
              templete += `<div class="icons habilitar d-flex justify-content-center">`;
              templete += `<a href="/igbj/habilitar_cargo?cargo=${repuesto.CARGO}" class="fas fa-lock align-self-center"></a>`;
              templete += `</div>`;
            }

            templete += `</td>`;
            //FIN ACCIONES
            templete += `</tr>`;

            contador=contador+1;
          });

          
          

          $tabla.innerHTML = templete;

          templete =  `<ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;" >`;
          templete +=  `<li class="page-item">`;
          templete +=  `<a class='page-link' aria-label='Previous' href='activo_view.php?nume="1"'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>`;
          templete +=  `<li class='page-item '><a class='page-link' href='activo_view.php?nume="2"' >${contador}</a></li>`;
          templete +=  `<a class='page-link' aria-label='Next' href='activo_view.php?nume=2'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>`;
          templete +=  `</ul>`;
          $paginador.innerHTML = templete;
        },
      });
    }
    vista();

    function $busquedar(send_dato) {
        $.ajax({
          type: "POST",
          url: "/igbj/busqueda_cargo",
          data: send_dato,
          success: function (response) {
            const repuesto = JSON.parse(response);
            let templete = ``;
            console.log(repuesto);
            contador=0;
            repuesto.forEach((repuesto) => {
                templete += `<tr>`;

                templete += `<td>${repuesto.CODCARGO}</td>`;
                templete += `<td>${repuesto.CODDEPARTAMENTO}</td>`;
                templete += `<td>${repuesto.CARGO}</td>`;
            //ESTADO
                templete += `<td>`;
                if(repuesto.ESTADO == 1){
                    templete += `<span>HABILITADO</span>`;
                }else{
                    templete += `<span>DESHABILITADO</span>`;
                }
                templete += `</td>`;

            //ACCIONES
                templete += `<td class="acciones">`;

                templete += `<div class="icons modificar d-flex justify-content-center">`;
                templete += `<a href="/igbj/modificar_cargo?cargo=${repuesto.CODCARGO}" class="fas fa-pen align-self-center"></a>`;
                templete += `</div>`;

                if(repuesto.ESTADO == 1){
                templete += `<div class="icons deshabilitar d-flex justify-content-center">`;
                templete += `<a href="/igbj/deshabilitar_cargo?cargo=${repuesto.CARGO}" class="fas fa-lock-open align-self-center"></a>`;
                templete += `</div>`;
                }else{
                templete += `<div class="icons habilitar d-flex justify-content-center">`;
                templete += `<a href="/igbj/habilitar_cargo?cargo=${repuesto.CARGO}" class="fas fa-lock align-self-center"></a>`;
                templete += `</div>`;
                }

                templete += `</td>`;
            //FIN ACCIONES
                templete += `</tr>`;

                contador=contador+1;
            });
            $tabla.innerHTML = templete;

            templete =  `<ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;" >`;
            templete +=  `<li class="page-item">`;
            templete +=  `<a class='page-link' aria-label='Previous' href='activo_view.php?nume="1"'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>`;
            templete +=  `<li class='page-item '><a class='page-link' href='activo_view.php?nume="2"' >${contador}</a></li>`;
            templete +=  `<a class='page-link' aria-label='Next' href='activo_view.php?nume=2'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>`;
            templete +=  `</ul>`;
            $paginador.innerHTML = templete;
          },
        });
    }

    $busqueda.addEventListener("keyup", function () {
    const cargo = $busqueda.value;
    const send_dato = {
      cargo: cargo,
    };
        $busquedar(send_dato);
    });

});

/*
<?php foreach ($cargos as $cargo): ?>
            <tr>
                    <td><?= $cargo['CODCARGO']; ?></td>
                    <td><?= $cargo['CODDEPARTAMENTO']; ?></td>
                    <td><?= $cargo['CARGO']; ?></td>
                    <td>
                        <?php if ($cargo['ESTADO'] == 1): ?>
                            <span>HABILITADO</span>
                        <?php else: ?>
                            <span>DESHABILITADO</span>
                        <?php endif; ?>
                    </td>
                    <td class="acciones">
                        <div class="icons modificar d-flex justify-content-center">
                            <a href="/igbj/modificar_cargo?cargo=<?= $cargo['CODCARGO']; ?>" class="fas fa-pen align-self-center"></a>
                        </div>                                              
                        <?php if ($cargo['ESTADO'] == 1): ?>
                            <div class="icons deshabilitar d-flex justify-content-center">
                                <a href="/igbj/deshabilitar_cargo?cargo=<?= $cargo['CARGO']; ?>" class="fas fa-lock-open align-self-center"></a>
                            </div>
                        <?php else: ?>
                            <div class="icons habilitar d-flex justify-content-center">
                                <a href="/igbj/habilitar_cargo?cargo=<?= $cargo['CARGO']; ?>" class="fas fa-lock align-self-center"></a>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
*/