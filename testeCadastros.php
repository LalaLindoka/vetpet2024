<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
    <link rel="stylesheet" href="cad.css">
</head>

<body>
    <div class="navbar">
        <h2>Cadastros</h2>
        <a href="#" onclick="loadData('pets')">Pets</a>
        <a href="#" onclick="loadData('pessoas')">Pessoas</a>
        <a href="#" onclick="loadData('servicos')">Serviços</a>
        <a href="#" onclick="loadData('vacinas')">Vacinas</a>
    </div>

    <div class="content">
        <div class="search-container">
            <h2>Pesquisar</h2>
            <input type="text" id="search" placeholder="Pesquisar por nome...">
            <button onclick="searchData()">Buscar</button>
        </div>

        <div class="table-container">
            <table id="data-table">
                <thead id="table-head">
                </thead>
                <tbody id="table-body">
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function loadData(categoria) {
            fetch('getData.php?categoria=' + categoria)
                .then(response => response.json())
                .then(data => {
                    const tableHead = document.getElementById('table-head');
                    const tableBody = document.getElementById('table-body');

                    tableHead.innerHTML = '';
                    tableBody.innerHTML = '';

                    if (data.length > 0) {
                        const headers = Object.keys(data[0]);
                        let headerRow = '<tr>';
                        headers.forEach(header => {
                            headerRow += `<th>${header}</th>`;
                        });
                        headerRow += '</tr>';
                        tableHead.innerHTML = headerRow;

                        // Cria o corpo da tabela
                        data.forEach(item => {
                            let row = '<tr>';
                            headers.forEach(header => {
                                row += `<td>${item[header]}</td>`;
                            });
                            row += '</tr>';
                            tableBody.innerHTML += row;
                        });
                    } else {
                        tableBody.innerHTML = '<tr><td colspan="100%">Nenhum dado encontrado</td></tr>';
                    }
                })
                .catch(error => {
                    console.error('Erro ao carregar os dados:', error);
                });
        }

        function searchData() {
            const searchValue = document.getElementById('search').value;
            if (searchValue) {
                fetch('searchData.php?query=' + searchValue)
                    .then(response => response.json())
                    .then(data => {
                        const tableHead = document.getElementById('table-head');
                        const tableBody = document.getElementById('table-body');

                        tableHead.innerHTML = '';
                        tableBody.innerHTML = '';

                        if (data.length > 0) {
                            const headers = Object.keys(data[0]);
                            let headerRow = '<tr>';
                            headers.forEach(header => {
                                headerRow += `<th>${header}</th>`;
                            });
                            headerRow += '</tr>';
                            tableHead.innerHTML = headerRow;

                            data.forEach(item => {
                                let row = '<tr>';
                                headers.forEach(header => {
                                    row += `<td>${item[header]}</td>`;
                                });
                                row += '</tr>';
                                tableBody.innerHTML += row;
                            });
                        } else {
                            tableBody.innerHTML = '<tr><td colspan="100%">Nenhum dado encontrado</td></tr>';
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao carregar os dados:', error);
                    });
            }
        }
    </script>
</body>

</html>
