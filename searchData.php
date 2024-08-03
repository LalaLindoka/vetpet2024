<?php
include("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {
    $query = $_GET['query'];

    $sql = "SELECT p.id AS id_paciente, p.nome AS nome_paciente, p.nascimento, p.raca, p.especie, p.porte, p.peso, p.sexo, p.castrado,
                   r.nome AS nome_responsavel, r.telefone, r.endereco
            FROM pacientes p
            LEFT JOIN responsaveis r ON p.id_responsavel = r.id
            WHERE p.nome LIKE '%$query%'";

    $resultado = mysqli_query($conexao, $sql);

    $dados = [];
    while ($row = mysqli_fetch_assoc($resultado)) {
        $dados[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($dados);

    mysqli_close($conexao);
}
?>
