<?= $header ?>
<div class="row">
    <div class="col-md-12">
        <h5>Actualizando datos del Proveedor</h5>

        <form action="<?= base_url('/proveedores/actualizar') ?>" method="post" id="form-proveedores"
            autocomplete="off">

            <input type="hidden" id="idproveedor" name="idproveedor" value="<?= $registro["id"] ?>">

            <div class="form-group">
                <label for="razonsocial">Razón Social</label>
                <input type="text" value="<?= $registro['razonsocial'] ?>" class="form-control" id="razonsocial"
                    name="razonsocial" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" value="<?= $registro['direccion'] ?>" class="form-control" id="direccion"
                    name="direccion" required>
            </div>

            <div class="form-group">
                <label for="ruc">RUC</label>
                <input type="text" value="<?= $registro['ruc'] ?>" class="form-control" id="ruc" name="ruc"
                    minlength="11" maxlength="11" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" value="<?= $registro['telefono'] ?>" class="form-control" id="telefono"
                    name="telefono" minlength="9" maxlength="9" required>
            </div>

            <div class="form-group">
                <label for="representante">Representante</label>
                <input type="text" value="<?= $registro['representante'] ?>" class="form-control" id="representante<"
                    name="representante" required>
            </div>

            <button type="submit" class="btn btn-outline-primary">Actualizar</button>
            <button type="reset" class="btn btn-outline-danger">Cancelar</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const formulario = document.querySelector("#form-proveedores")

        formulario.addEventListener("submit", function (event) {
            event.preventDefault() // STOP

            if (!confirm("¿Está seguro de actualizar el proveedor?")) {
                return;
            }
            formulario.submit()
        })
    })
</script>


<?= $footer ?>