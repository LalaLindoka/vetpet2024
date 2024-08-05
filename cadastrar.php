<?php
include("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_responsavel = $_POST['nome_responsavel'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sqlResponsavel = "INSERT INTO responsaveis (nome, telefone, endereco) VALUES ('$nome_responsavel', '$telefone', '$endereco')";
    if (mysqli_query($conexao, $sqlResponsavel)) {
        $responsavel_id = mysqli_insert_id($conexao);

        $nome = $_POST['nome'];
        $nascimento = $_POST['nascimento'];
        $raca = $_POST['raca'];
        $especie = $_POST['especie'];
        $porte = $_POST['porte'];
        $peso = $_POST['peso'];
        $sexo = $_POST['sexo'];
        $castrado = $_POST['castrado'];
       
        $sqlPaciente = "INSERT INTO pacientes (nome, nascimento, raca, especie, porte, peso, sexo, castrado, responsavel_id) 
                        VALUES ('$nome', '$nascimento', '$raca', '$especie', '$porte', '$peso', '$sexo', '$castrado', '$responsavel_id')";
        if (mysqli_query($conexao, $sqlPaciente)) {
            echo "Paciente cadastrado com sucesso!";
            echo '<br><br><a href="testeindex.php"><button>Voltar</button></a>';
        } else {
            echo "Erro ao cadastrar paciente: " . mysqli_error($conexao);
            echo '<br><br><a href="cadastrarForm.html"><button>Tentar Novamente</button></a>';
        }
    } else {
        echo "Erro ao cadastrar responsável: " . mysqli_error($conexao);
        echo '<br><br><a href="cadastrarForm.html"><button>Tentar Novamente</button></a>';
    }

    mysqli_close($conexao);
}
?>
