<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações dos Pacientes</title>

</head>

<body>

    <!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações dos Pacientes</title>
    <link rel="stylesheet" href="cad.css">
    <style>
        :root {
            --color-primary: #6C9BCF;
            --color-danger: #FF0060;
            --color-success: #1B9C85;
            --color-warning: #F7D060;
            --color-white: #fff;
            --color-info-dark: #7d8da1;
            --color-light: rgba(132, 139, 200, 0.18);
            --color-dark-variant: #677483;
            --card-border-radius: 2rem;
            --border-radius-1: 0.4rem;
            --border-radius-2: 1.2rem;
            --card-padding: 1.8rem;
            --padding-1: 1.2rem;
            --box-shadow: 0 2rem 3rem var(--color-light);
        }

        body {
            background-color: var(--color-background);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        /* Estilos para a barra lateral */
        aside {
            width: 250px;
            height: 100vh;
            background-color: var(--color-white);
            box-shadow: var(--box-shadow);
            border-radius: 15px;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
        }

        /* Estilos para o controle de alternância */
        aside .toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.4rem;
        }

        /* Estilos para o logotipo no controle de alternância */
        aside .toggle .logo {
            display: flex;
            gap: 0.5rem;
        }

        aside .toggle .logo img {
            width: 2rem;
            height: 2rem;
        }

        aside .toggle .close {
            padding-right: 1rem;
            display: none;
        }

        /* Estilos para a barra lateral */
        aside .sidebar {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        aside .sidebar a {
            display: flex;
            align-items: center;
            color: var(--color-info-dark);
            height: 3.7rem;
            gap: 1rem;
            position: relative;
            margin-left: 2rem;
            transition: all 0.3s ease;
        }

        aside .sidebar a span {
            font-size: 1.6rem;
            transition: all 0.3s ease;
        }

        aside .sidebar a:last-child {
            position: absolute;
            bottom: 2rem;
            width: 100%;
        }

        aside .sidebar a.active {
            width: 100%;
            color: var(--color-primary);
            background-color: var(--color-light);
            margin-left: 0;
        }

        aside .sidebar a.active::before {
            content: '';
            width: 6px;
            height: 18px;
            background-color: var(--color-primary);
        }

        aside .sidebar a.active span {
            color: var(--color-primary);
            margin-left: calc(1rem - 3px);
        }

        aside .sidebar a:hover {
            color: var(--color-primary);
        }

        aside .sidebar a:hover span {
            margin-left: 0.6rem;
        }

        aside .sidebar .message-count {
            background-color: var(--color-danger);
            padding: 2px 6px;
            color: var(--color-white);
            font-size: 11px;
            border-radius: var(--border-radius-1);
        }

        /* Estilos para a tabela e conteúdo principal */
        .content {
            margin-left: 270px; /* Espaço para a barra lateral */
            padding: 20px;
            width: calc(100% - 270px); /* Largura restante */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    
    <aside>
        <div class="toggle">
            <div class="logo">
                <h2>Teste</h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>
            </div>
        </div>

        <div class="sidebar">
            <a href="dashboard.php" class="active">
                <span class="material-icons-sharp"></span>
                <h3>Dashboard</h3>
            </a>
            <a href="participantes">
                <span class="material-icons-sharp"></span>
                <h3>Users</h3>
            </a>
            <a href="perfil.php">
                <span class="material-icons-sharp"></span>
                <h3>Perfil</h3>
            </a>
            <a href="calen" target="_blank">
                <span class="material-icons-sharp"></span>
                <h3>Calendário</h3>
            </a>
            <a href="pagamento">
                <span class="material-icons-sharp"></span>
                <h3>Pagamento</h3>
            </a>
        </div>
    </aside>

    <div class="content">
        <div class="navbar">
            <a href="cadastrarForm.html">Cadastrar paciente</a>
            <a href="excluirForm.php">Excluir responsável ou paciente</a>
            <a href="testeindex.php">Menu</a>
            <div class="search-container">
                <form action="pesquisarPaciente.php" method="get">
                    <input type="text" placeholder="Pesquisar Paciente..." name="pesquisa">
                    <button type="submit">Buscar</button>
                </form>
            </div>
        </div>

        <div style="padding: 20px">
            <?php
            include("conecta.php");

            $sql = "SELECT p.nome, p.nascimento, p.raca, p.especie, p.porte, p.peso, p.sexo, p.castrado, r.nome AS responsavel
                    FROM pacientes p
                    JOIN responsaveis r ON p.responsavel_id = r.id";
            $resultado = mysqli_query($conexao, $sql);

            echo '<table>
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">Raça</th>
                    <th scope="col">Espécie</th>
                    <th scope="col">Porte</th>
                    <th scope="col">Peso (kg)</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Castrado</th>
                    <th scope="col">Responsável</th>
                </tr>
            </thead>
            <tbody>';

            while ($dados = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $dados['nome'] . "</td>";
                echo "<td>" . $dados['nascimento'] . "</td>";
                echo "<td>" . $dados['raca'] . "</td>";
                echo "<td>" . $dados['especie'] . "</td>";
                echo "<td>" . $dados['porte'] . "</td>";
                echo "<td>" . $dados['peso'] . "</td>";
                echo "<td>" . $dados['sexo'] . "</td>";
                echo "<td>" . ($dados['castrado'] ? 'Sim' : 'Não') . "</td>";
                echo "<td>" . $dados['responsavel'] . "</td>";
                echo "</tr>";
            }

            echo '</tbody>
            </table>';
            ?>
        </div>
    </div>
</body>

</html>