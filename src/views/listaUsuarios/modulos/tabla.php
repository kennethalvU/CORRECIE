<div class="card-body">
    <table id="tablaDocs" class="table table-hover table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Usuario</th>
                <th class="text-center">Rol</th>
                <th class="text-center">Departamento</th>
            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
    </table>
</div>


<script>


    function obtenerListadoUsuarios() {

        const url = 'listaUsuarios';

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

        userData.forEach(user => {
            tableBody.innerHTML += `
                <tr>
                    <td class="text-center">${user.Nombre}</td>
                    <td class="text-center">${user.Usuario}</td>
                    <td class="text-center">${user.Rol}</td>
                    <td class="text-center">${user.Departamento}</td>
                </tr>
            `;
        });
    }

    obtenerListadoUsuarios();


</script>