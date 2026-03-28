<?= $header ?>

<div class="row">
    <div class="col-md-12">
        <h5>Administrador de productos</h5>
        <button type="button" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#modal-productos">
            Nuevo producto
        </button>
        <table class="table table-sm mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="content-productos">

            </tbody>
        </table>
    </div>
</div>

<!-- Zona de modal -->
<div class="modal fade" id="modal-productos" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                <form id="formulario-productos" autocapitalize="off">
                    <div class="form-group">
                        <label for="tipos">Tipo:</label>
                        <input type="text" name="tipos" id="tipos" class="form-control rounded-0" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion" class="rounded-0 form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="text" name="precio" id="precio" class="rounded-0 form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="text" name="stock" id="stock" class="rounded-0 form-control" required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-danger rounded-0"
                    data-dismiss="modal">Cancelar</button>
                <button type="submit" form="formulario-productos"
                    class="btn btn-sm btn-outline-primary rounded-0">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin zona de modal -->

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Referencias, declaración de objetos
        const tabla = document.querySelector("#content-productos"); // <tbody>
        const formulario = document.querySelector("#formulario-productos"); // <form>

        // Función estandar
        function notificar(mensaje = '') {
            Swal.fire({
                text: mensaje,
                icon: 'info',
                position: 'top-end',
                timer: 1500,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: true,
                background: '#ffeaa7',
            })
        }

        // Funciones asíncronas
        async function registrarProducto() {
            try {
                // Objeto que contenga los datos para el registro
                const producto = {
                    tipo: document.querySelector("#tipos").value,
                    descripcion: document.querySelector("#descripcion").value,
                    precio: document.querySelector("#precio").value,
                    stock: document.querySelector("#stock").value,
                }
                // Se envía la solicitud
                const response = await fetch(`<?= base_url('productosX/registrar') ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(producto)
                })

                const data = await response.json();
                notificar(data.message);

                // No funcionó
                if (!data.success) {
                    return;
                }

                // Todo bien
                // Cerrar modal
                $('#modal-productos').modal('hide');

                // Formulario se reinicia
                formulario.reset();

                // Recargar tabla
                getProductosX();
            } catch (error) {
                console.error("No se logró registrar", error);
            }
        }

        async function getProductosX() {
            try {
                const response = await fetch(`<?= base_url('productosX/listar') ?>`)
                const data = await response.json();

                // Si el servidor no respondió correcatamente
                if (response.status !== 200) {
                    return;
                }

                // Si no encontramos datos...
                if (!data) {
                    return;
                }

                tabla.innerHTML = ``

                data.forEach(element => {
                    tabla.innerHTML += `
                    <tr>
                        <td>${element.id}</td>
                        <td>${element.tipo}</td>
                        <td>${element.descripcion}</td>
                        <td>${element.precio}</td>
                        <td>
                            <a href='#' class='btn btn-sm btn-outline-primary rounded-0'>Editar</a>
                            <a href='#' class='btn btn-sm btn-outline-danger rounded-0'>Eliminar</a>
                        </td>
                    </tr>
                    `
                })
            } catch (error) {
                console.error("Error al obtener los productos:", error);
            }
        }

        // Eventos
        formulario.addEventListener('submit', function (event) {
            event.preventDefault(); // STOP

            if (!confirm("¿Registramos este producto?")) {
                return;
            }
            registrarProducto();
        })

        // Función autoejecución
        getProductosX();
    })
</script>

<?= $footer ?>