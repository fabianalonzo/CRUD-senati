<?= $header ?>
<div class="row">
  <div class="col-md-12">
    <h5>Lista de Clientes</h5>
    <a href="<?= base_url('clientes/registrar') ?>" class="btn btn-sm btn-primary">Agregar</a>

    <table class="table mt-3" id="tabla-clientes">
      <thead>
        <tr>
          <th>#</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>DNI</th>
          <th>Teléfono</th>
          <th>Comandos</th>
        </tr>
      </thead>
      <tbody id="content-table">
        <?php foreach ($clientes as $cliente): ?>
          <tr>
            <td><?= $cliente['id'] ?></td>
            <td><?= $cliente['apellidos'] ?></td>
            <td><?= $cliente['nombres'] ?></td>
            <td><?= $cliente['dni'] ?></td>
            <td><?= $cliente['telefono'] ?></td>
            <td>
              <!-- Eliminación previa confirmación -->
              <a href="#" class="btn btn-sm btn-danger btn-eliminar" data-idcliente="<?= $cliente['id'] ?>"
                data-nombres="<?= $cliente['nombres'] ?>">
                Eliminar
              </a>

              <!-- Si deseamos tener control sobre un grupo específico de elementos debemos agregarle un valor diferenciador -->
              <a href="#" class="btn btn-sm btn-info btn-actualizar" data-idcliente="<?= $cliente['id'] ?>"
                data-nombres="<?= $cliente['nombres'] ?>">Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    // Referencia
    const dataTable = document.querySelector("#content-table")

    // Evento (en todo el cuerpo de la tabla)
    dataTable.addEventListener("click", function (event) {

      // Detectar los botones de eliminación
      if (event.target.classList.contains("btn-eliminar")) {
        const idcliente = event.target.getAttribute("data-idcliente")
        const nombres = event.target.getAttribute("data-nombres")

        if (!confirm("¿Desea eliminar el registro de " + nombres + "?")) return;

        // Procederé a eliminar...
        window.location.href = "<?= base_url('/clientes/eliminar/') ?>" + idcliente
      }

      if (event.target.classList.contains("btn-actualizar")) {
        const idcliente = event.target.getAttribute("data-idcliente")
        const nombres = event.target.getAttribute("data-nombres")

        if (!confirm("¿Desea actualizar el registro de " + nombres + "?")) return;

        // Procederé a editar...
        window.location.href = "<?= base_url('/clientes/buscar/') ?>" + idcliente
      }
    })
  })
</script>

<?= $footer ?>