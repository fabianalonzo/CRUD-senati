<?= $header ?>

<div class="row">
  <div class="col-md-12">
    <h5>Administrador de vehículos</h5>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-vehiculos">
      Nuevo vehículo
    </button>
    <table class="table table-sm mt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Año</th>
          <th>Color</th>
          <th>Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="content-vehiculos">

      </tbody>
    </table>
  </div>
</div>

<!-- Zona de modal -->

<div class="modal fade" id="modal-vehiculos" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Complete el formulario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario-vehiculos" autocapitalize="off">
          <div class="form-group">
            <label for="marcas">Marca:</label>
            <select name="marcas" id="marcas" class="form-control rounded-0" required>
              <option value="">Seleccione </option>
            </select>
          </div>

          <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" class="rounded-0 form-control" required>
          </div>

          <div class="form-group">
            <label for="anio">Año:</label>
            <input type="text" name="anio" id="anio" class="rounded-0 form-control" required>
          </div>

          <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" class="rounded-0 form-control" required>
          </div>

          <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" class="rounded-0 form-control text-right" required>
          </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" form="formulario-vehiculos" class="btn btn-sm btn-outline-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {

    const tabla = document.querySelector("#content-vehiculos")
    const listaMarcas = document.querySelector("#marcas")
    const formulario = document.querySelector("#formulario-vehiculos")

    function notificar(mensaje = ''){
      swal.fire({
        text: mensaje,
        icon: 'info',
        position: 'top-end',
        timer: 2500,
        timerProgressBar: true,
        showConfirmButton: false,
        toast: true
      })
    }

    //Funciones asincronas
    async function registrarVehiculo(){
      try {

        const vehiculo = {
          idmarca: listaMarcas.value,
          modelo: document.querySelector("#modelo").value,
          anio: document.querySelector("#anio").value,
          color: document.querySelector("#color").value,
          precio: document.querySelector("#precio").value
        }

        const response = await fetch(`<?= base_url('vehiculos/registrar') ?>`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(vehiculo)
        })

        const data = await response.json()
        notificar(data.message)

        if (!data.success) {
          return;
        }

        $('#modal-vehiculos').modal('hide');

        //Reiniciar/Vaciar formulario
        formulario.reset();

        console.log(data)

      } catch (e) {
        console.error("No se logró registrar:", e)
      }
    }

    async function obtenerMarcas() {
      try {
        const response = await fetch(`<?= base_url('marcas/listar') ?>`)
        const data = await response.json();

        if (response.status !== 200) {
          return;
        }
        if (!data) {
          return;
        }

        data.forEach(element => {
          const tagOption = document.createElement("option")
          tagOption.value = element.id
          tagOption.innerText = element.marca
          listaMarcas.appendChild(tagOption)
        })

      } catch (error) {
        console.error("No se pudo obtener las marcas:", error);
      }
    }

    async function obtenerVehiculos() {
      try {
        const response = await fetch(`<?= base_url('vehiculos/listar') ?>`);
        const data = await response.json();

        if (response.status != 200) { return; }

        if (!data) { return; }

        tabla.innerHTML = ``

        //¡Todo OK procedemos!
        data.forEach(element => {
          tabla.innerHTML += `
          <tr>
            <td>${element.id}</td>
            <td>${element.marca}</td>
            <td>${element.modelo}</td>
            <td>${element.anio}</td>
            <td>${element.color}</td>
            <td>${element.precio}</td>
            <td>
             <a href='#' class='btn btn-sm btn-info'>Editar</a>
             <a href='#' class='btn btn-sm btn-danger'>Eliminar</a>
            </td>
          </tr>
          `
        });

      } catch (e) {
        console.error("Error al obtener los datos", e);
      }
    }

    //Eventos
    formulario.addEventListener("submit", function (event){
      event.preventDefault() //STOP

      if (!confirm("¿Registramos este vehículo?")) { return; }
      registrarVehiculo()//GOOOOOOOOOOOOOOOOOOOO
    })

    //Funcion autoejecucion
    obtenerVehiculos();
    obtenerMarcas();

  })
</script>

<!-- Fin zona de modal -->
<?= $footer ?>