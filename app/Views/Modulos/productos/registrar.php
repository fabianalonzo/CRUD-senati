<?= $header ?>
<div class="row">
    <div class="col-md-12">
        <h5>Registro de nuevos Productos</h5>

        <form action="<?= base_url('/productos/guardar') ?>" method="post" id="form-productos" autocomplete="off">
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" required>
            </div>

            <button type="submit" class="btn btn-outline-primary">Registrar</button>
            <button type="reset" class="btn btn-outline-danger">Cancelar</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const formulario = document.querySelector("#form-productos")

        formulario.addEventListener("submit", function (event) {
            event.preventDefault() // STOP

            if (!confirm("¿Esta seguro de registrar el producto?")) {
                return;
            }
            formulario.submit()
        })
    })
</script>

<?= $footer ?>