<?php
include("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $id = $_POST['id'];
    if ($tipo == "paciente") {
        $idPaciente = explode('_', $id)[1];
        $sql = "DELETE FROM pacientes WHERE id = $idPaciente";
    } elseif ($tipo == "responsavel") {
        $idResponsavel = explode('_', $id)[1];
        $sqlRemoverPacientes = "DELETE FROM pacientes WHERE responsavel_id = $idResponsavel";
        mysqli_query($conexao, $sqlRemoverPacientes);
        $sql = "DELETE FROM responsaveis WHERE id = $idResponsavel";
    } else {
        echo "Tipo inválido!";
        exit;
    }

    if (mysqli_query($conexao, $sql)) {
        echo ucfirst($tipo) . " excluído com sucesso!";
        echo '<br><br><a href="index.php"><button>Voltar</button></a>';
    } else {
        echo "Erro ao excluir " . $tipo . ": " . mysqli_error($conexao);
        echo '<br><br><a href="excluirForm.html"><button>Tentar Novamente</button></a>';
    }

    mysqli_close($conexao);
}
?>
