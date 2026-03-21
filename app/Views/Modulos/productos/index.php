<?= $header ?>
<div class="row">
  <div class="col-md-12">
    <h5>Lista de Productos</h5>
    <a href="<?= base_url('productos/registrar') ?>" class="btn btn-sm btn-primary">Agregar</a>

    <table class="table mt-3" id="tabla-productos">
      <thead>
        <tr>
          <th>#</th>
          <th>Tipo</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Comandos</th>
        </tr>
      </thead>
      <tbody id="content-table">
        <?php foreach ($productos as $producto): ?>
          <tr>
            <td><?= $producto['id'] ?></td>
            <td><?= $producto['tipo'] ?></td>
            <td><?= $producto['descripcion'] ?></td>
            <td><?= $producto['precio'] ?></td>
            <td><?= $producto['stock'] ?></td>
            <td>
              <a href="#" class="btn btn-sm btn-danger btn-eliminar" data-idproducto="<?= $producto['id'] ?>"
                data-tipo="<?= $producto['tipo'] ?>">Eliminar</a>

              <a href="#" class="btn btn-sm btn-info btn-actualizar" data-idproducto="<?= $producto['id'] ?>"
                data-tipo="<?= $producto['tipo'] ?>">Editar</a>
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
        const idproducto = event.target.getAttribute("data-idproducto")
        const tipo = event.target.getAttribute("data-tipo")

        if (!confirm("¿Desea eliminar el registro de " + tipo + "?")) return;

        // Procederé a eliminar
        window.location.href = "<?= base_url("/productos/eliminar/") ?>" + idproducto
      }

      if (event.target.classList.contains("btn-actualizar")) {
        const idproducto = event.target.getAttribute("data-idproducto")
        const tipo = event.target.getAttribute("data-tipo")

        if (!confirm("¿Desea actualizar el registro de " + tipo + "?")) return;

        // Procederé a editar...
        window.location.href = "<?= base_url("/productos/buscar/") ?>" + idproducto
      }
    })
  })
</script>

<?= $footer ?>