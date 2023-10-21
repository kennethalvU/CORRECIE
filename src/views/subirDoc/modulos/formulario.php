<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-4">Subir Documentos</h2>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Selecciona y sube tu documento</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data" onsubmit="subirDocumentos(event);">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Departamento</label>
                                <select id="dpdDepartamento" class="form-control">
                                    <option value="0">Selecciona un departamento</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtTipoDoc">Tipo de Documento</label>
                                <input type="text" class="form-control" id="txtTipoDoc">
                            </div>
                            <div class="form-group">
                                <label for="txtDescripcion">Descripción</label>
                                <textarea class="form-control" id="txtDescripcion"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="txtFecha">Fecha</label>
                                <input type="date" class="form-control" id="txtFecha">
                            </div>
                            <div class="form-group">
                                <label for="txtDestino">Destino</label>
                                <input type="text" class="form-control" id="txtDestino">
                            </div>
                            <div class="form-group">
                                <label for="txtFolder">Folder</label>
                                <input type="text" class="form-control" id="txtFolder">
                            </div>
                            <div class="form-group">
                                <label for="txtCaja">Caja</label>
                                <input type="text" class="form-control" id="txtCaja">
                            </div>
                            <div class="form-group">
                                <label for="txtObservaciones">Observaciones</label>
                                <input type="text" class="form-control" id="txtObservaciones">
                            </div>
                            <div class="form-group">
                                <label for="fileInput">Archivo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileInput"
                                            accept=".pdf, .doc, .docx">
                                        <label class="custom-file-label" for="fileInput">Selecciona el documento</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-dark">Subir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function subirDocumentos(event) {
        event.preventDefault();
        let formData = new FormData();
        formData.append('departamento', document.querySelector('#dpdDepartamento').value);
        formData.append('tipoDoc', document.querySelector('#txtTipoDoc').value);
        formData.append('descripcion', document.querySelector('#txtDescripcion').value);
        formData.append('fecha', document.querySelector('#txtFecha').value);
        formData.append('destino', document.querySelector('#txtDestino').value);
        formData.append('folder', document.querySelector('#txtFolder').value);
        formData.append('caja', document.querySelector('#txtCaja').value);
        formData.append('observaciones', document.querySelector('#txtObservaciones').value);
        formData.append('archivo', document.querySelector('#fileInput').files[0]);
        fetch('subirDoc', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.error == 0)
                    alert('Documento subido correctamente');
                else if (data.error == 1)
                    alert('Documento muy grande');
                else if (data.error == 2)
                    alert('Formato incorrecto');
                else (data.error == 3)
                alert('Error al subir el documento');
            })
            .catch(error => console.error(error));
    }

    function llenarSelect() {
        fetch('subirDoc')
            .then(response => response.json())
            .then(datos => {
                const selectElement = document.getElementById('dpdDepartamento');
                console.log(datos);
                datos.forEach(dato => {
                    const optionElement = document.createElement('option');
                    optionElement.value = dato.id_departamento;
                    optionElement.textContent = dato.nombre;
                    selectElement.appendChild(optionElement);
                });
            })
            .catch(error => console.error('Hubo un error al obtener los datos:', error));
    }

    document.addEventListener('DOMContentLoaded', llenarSelect);

</script>
