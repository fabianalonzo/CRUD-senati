<?= $header ?>
<div class="row">
    <div class="col-md-12">
        <h5>Actualizando datos del Producto</h5>

        <form action=" <?= base_url('/productos/actualizar') ?>" method="post" id="form-productos" autocomplete="off">

            <input type="hidden" id="idproducto" name="idproducto" value="<?= $registro["id"] ?>">

            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" value="<?= $registro['tipo'] ?>" class="form-control" id="tipo" name="tipo" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" value="<?= $registro['descripcion'] ?>" class="form-control" id="descripcion"
                    name="descripcion" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" value="<?= $registro['precio'] ?>" class="form-control" id="precio" name="precio"
                    required>
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" value="<?= $registro['stock'] ?>" class="form-control" id="stock" name="stock"
                    required>
            </div>

            <button type="submit" class="btn btn-outline-primary">Actualizar</button>
            <button type="reset" class="btn btn-outline-danger">Cancelar</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const formulario = document.querySelector("#form-productos")

        formulario.addEventListener("submit", function (event) {
            event.preventDefault() // STOP

            if (!confirm("¿Está seguro de actualizar el producto?")) {
                return;
            }
            formulario.submit()
        })
    })
</script>


<?= $footer ?>