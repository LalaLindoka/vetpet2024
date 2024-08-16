<?php
include("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];

    $sql = "SELECT * FROM clientes WHERE nome LIKE '%$pesquisa%'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<h2>Resultados da Pesquisa</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Nome do Cliente</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td>" . $row['endereco'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo '<br><br><a href="clientes.php"><button>Voltar</button></a>';
    } else {
        echo "Nenhum cliente encontrado.";
        echo '<br><br><a href="clientes.php"><button>Voltar</button></a>';
    }

    mysqli_close($conexao);
}
?>
