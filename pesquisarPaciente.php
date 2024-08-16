<?php
include("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];

    $sql = "SELECT * FROM pacientes WHERE nome LIKE '%$pesquisa%'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<h2>Resultados da Pesquisa</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Nome do Paciente</th>
                    <th>Data de Nascimento</th>
                    <th>Raça</th>
                    <th>Espécie</th>
                    <th>Porte</th>
                    <th>Peso</th>
                    <th>Sexo</th>
                    <th>Castrado</th>
                    <th>Abrir ficha</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['nascimento'] . "</td>";
            echo "<td>" . $row['raca'] . "</td>";
            echo "<td>" . $row['especie'] . "</td>";
            echo "<td>" . $row['porte'] . "</td>";
            echo "<td>" . $row['peso'] . "</td>";
            echo "<td>" . $row['sexo'] . "</td>";
            echo "<td>" . ($row['castrado'] ? 'Sim' : 'Não') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo '<br><br><a href="cadastros.php"><button>Voltar</button></a>';
    } else {
        echo "Nenhum paciente encontrado.";
        echo '<br><br><a href="cadastros.php"><button>Voltar</button></a>';
    }

    mysqli_close($conexao);
}
?>
