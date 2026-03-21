<?= $header ?>
<div class="row">
  <div class="col-md-12">
    <h5>Lista de Proveedores</h5>
    <a href="<?= base_url('proveedores/registrar') ?>" class="btn btn-sm btn-primary">Agregar</a>

    <table class="table mt-3">
      <thead>
        <tr>
          <th>#</th>
          <th>Razon Social</th>
          <th>Direccion</th>
          <th>RUC</th>
          <th>Teléfono</th>
          <th>Representante</th>
          <th>Comandos</th>
        </tr>
      </thead>
      <tbody id="content-table">
        <?php foreach ($proveedores as $proveedor): ?>
          <tr>
            <td><?= $proveedor['id'] ?></td>
            <td><?= $proveedor['razonsocial'] ?></td>
            <td><?= $proveedor['direccion'] ?></td>
            <td><?= $proveedor['ruc'] ?></td>
            <td><?= $proveedor['telefono'] ?></td>
            <td><?= $proveedor['representante'] ?></td>
            <td>
              <a href="#" class="btn btn-sm btn-danger btn-eliminar" data-idproveedor="<?= $proveedor['id'] ?>"
                data-razonsocial="<?= $proveedor['razonsocial'] ?>">Eliminar</a>

              <a href="#" class="btn btn-sm btn-info btn-actualizar" data-idproveedor="<?= $proveedor['id'] ?>"
                data-razonsocial="<?= $proveedor['razonsocial'] ?>">Editar</a>
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
        const idproveedor = event.target.getAttribute("data-idproveedor")
        const razonsocial = event.target.getAttribute("data-razonsocial")

        if (!confirm("¿Desea eliminar el registro de " + razonsocial + "?")) return;

        // Procederé a eliminar...
        window.location.href = "<?= base_url("/proveedores/eliminar/") ?>" + idproveedor
      }

      if (event.target.classList.contains("btn-actualizar")) {
        const idproveedor = event.target.getAttribute("data-idproveedor")
        const razonsocial = event.target.getAttribute("data-razonsocial")

        if (!confirm("¿Desea actualizar el registro de " + razonsocial + "?")) return;

        // Procederé a editar..
        window.location.href = "<?= base_url("/proveedores/buscar/") ?>" + idproveedor
      }

    })
  })
</script>

<?= $footer ?>