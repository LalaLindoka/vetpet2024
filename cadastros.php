<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações dos Pacientes</title>

</head>

<body>
<div class="navbar">
        <a href="cadastrarForm.html">Cadastrar paciente</a>
        <div class="search-container">
            <form action="pesquisarPaciente.php" method="get">
                <input type="text" placeholder="Pesquisar Paciente..." name="pesquisa">
                <button type="submit">Buscar</button>
                <link rel="stylesheet" href="cad.css">
            </form>
        </div>
    </div>

    <div style="padding: 20px">


    <a href="excluirForm.php">Excluir responsável ou paciente</a>
    <?php
    include("conecta.php");

    $sql = "SELECT p.id, p.nome, p.nascimento, p.raca, p.especie, p.porte, p.peso, p.sexo, p.castrado, r.nome AS responsavel
            FROM pacientes p
            JOIN responsaveis r ON p.responsavel_id = r.id";
    $resultado = mysqli_query($conexao, $sql);

    echo '<table>
    <thead>
      <tr>
        <th scope="col">ID</th>
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
        echo "<td>" . $dados['id'] . "</td>";
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
</body>

</html>
