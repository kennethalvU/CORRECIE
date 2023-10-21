<div class="card-body">
    <table id="tablaDocs" class="table table-hover table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" colspan="8">OFICIOS REMITIDOS PUBLICOS</th>
            </tr>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Tipo de Documento</th>
                <th class="text-center">Descripcion del Documento</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Destino</th>
                <th class="text-center">Ubicacion</th>
                <th class="text-center">Observaciones</th>
                <th class="text-center">Ver Documento</th>
            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
    </table>
</div>

<script>
    function obtenerListadoDocumentos() {
        const url = 'buscarDoc';

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Request error');
                }
                return response.json();
            })
            .then(data => {
                renderTable(data);
            })
            .catch(error => {
                console.log('Error:', error);
            });
    }

    function renderTable(userData) {
        let tableBody = document.getElementById('tableBody');
        console.log(userData);
        
        let counter = 1; // Iniciar contador

        userData.forEach(user => {
            tableBody.innerHTML += `
                <tr>
                    <td class="text-center">${counter++}</td> <!-- Incrementar contador aquí -->
                    <td class="text-center">${user.tipoDoc}</td>
                    <td class="text-center">${user.descripcionDoc}</td>
                    <td class="text-center">${user.fechaDoc}</td>
                    <td class="text-center">${user.destinoDoc}</td>
                    <td class="text-center">${user.ubicacionDoc}</td>
                    <td class="text-center">${user.observacionesDoc}</td>
                    <td class="text-center">
                    <a href="${user.rutaDoc}.pdf" target="_blank">
                        <i class="fas fa-file-pdf fa-2x text-danger"></i>
                    </a>
                </td>
                </tr>
            `;
        });
    }

    obtenerListadoDocumentos();
</script>
