<?php
include("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['especie'])) {
    $especie = $_GET['especie'];

    $sql = "SELECT id, nome FROM racas WHERE especie = '$especie'";
    $resultado = mysqli_query($conexao, $sql);

    $racas = [];
    while ($row = mysqli_fetch_assoc($resultado)) {
        $racas[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($racas);

    mysqli_close($conexao);
}
?>
