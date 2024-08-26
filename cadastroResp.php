<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações dos Pacientes</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="cad.css">
    <style>
        :root {
            --color-primary: #ff9bb1;
            --color-danger: #FF0060;
            --color-success: #1B9C85;
            --color-white: #fff;
            --color-info-dark: #7d8da1;    
            --color-light: rgba(132, 139, 200, 0.18);
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
            position: fixed;
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
            /* Espaço para a barra lateral */
            padding: 20px;
            width: calc(100% - 270px);
            /* Largura restante */
            margin-left: 270px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
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
        
        <div class="sidebar">
            <div class="toggle">
                <div class="logo">
                    <h2>Cadastros</h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <a href="cadastros.php">
                <span class="material-icons-sharp"></span>
                <h3>Pets</h3>
            </a>
            <a href="cadastroResp.php" class="active">
                <span class="material-icons-sharp"></span>
                <h3>Responsáveis</h3>
            </a>
            <a href="servic.php">
                <span class="material-icons-sharp"></span>
                <h3>Serviços</h3>
            </a>
            <a href="medi.php" target="_blank">
                <span class="material-icons-sharp"></span>
                <h3>Medicamentos</h3>
            </a>
            <a href="index.php">
                <span class="material-icons-sharp"></span>
                <h3>Menu</h3>
            </a>
        </div>
    </aside>

    <div class="content">
        <header>
            <div class="navbar">
                <img src="logo.png" alt="Logo">
                <div class="search-container">
                    <form action="pesquisarResp.php" method="get">
                        <input type="text" placeholder="Pesquisar Responsavel..." name="pesquisa">
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </header>

        <div style="padding: 10px">
            <?php
            include("conecta.php");

            // Verifica se a conexão foi bem-sucedida
            if (!$conexao) {
                die("Conexão falhou: " . mysqli_connect_error());
            }

            $sql = "SELECT p.nome AS paciente_nome, r.nome AS responsavel_nome, r.telefone, r.endereco
        FROM pacientes p
        JOIN responsaveis r ON p.responsavel_id = r.id";
            $resultado = mysqli_query($conexao, $sql);

            if (!$resultado) {
                die("Erro na consulta: " . mysqli_error($conexao));
            }

            echo '<table>
<thead>
    <tr>
        <th scope="col">Nome do Paciente</th>
        <th scope="col">Telefone</th>
        <th scope="col">Endereço</th>
        <th scope="col">Nome do Responsável</th>
    </tr>
</thead>
<tbody>';

            while ($dados = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($dados['responsavel_nome']) . "</td>";
                echo "<td>" . htmlspecialchars($dados['telefone']) . "</td>";
                echo "<td>" . htmlspecialchars($dados['endereco']) . "</td>";
                echo "<td>" . htmlspecialchars($dados['paciente_nome']) . "</td>";
                echo "</tr>";
            }

            echo '</tbody>
</table>';
            ?>
        </div>
    </div>
</body>

</html>