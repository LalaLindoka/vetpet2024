<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Paciente ou Responsável</title>
    <style>
        form {
            width: 50%;
            margin: auto;
        }
        div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Excluir Paciente ou Responsável</h1>
    <form action="excluir.php" method="post">
        <div>
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="paciente">Paciente</option>
                <option value="responsavel">Responsável</option>
            </select>
        </div>
        <div>
            <label for="id">ID:</label>
            <select id="id" name="id" required>
                <?php
                include("conecta.php");
                $sqlPacientes = "SELECT id, nome FROM pacientes";
                $resultadoPacientes = mysqli_query($conexao, $sqlPacientes);

                echo '<optgroup label="Pacientes">';
                while ($paciente = mysqli_fetch_assoc($resultadoPacientes)) {
                    echo '<option value="paciente_' . $paciente['id'] . '">Paciente: ' . $paciente['nome'] . ' (ID: ' . $paciente['id'] . ')</option>';
                }
                echo '</optgroup>';

   
                $sqlResponsaveis = "SELECT id, nome FROM responsaveis";
                $resultadoResponsaveis = mysqli_query($conexao, $sqlResponsaveis);

                echo '<optgroup label="Responsáveis">';
                while ($responsavel = mysqli_fetch_assoc($resultadoResponsaveis)) {
                    echo '<option value="responsavel_' . $responsavel['id'] . '">Responsável: ' . $responsavel['nome'] . ' (ID: ' . $responsavel['id'] . ')</option>';
                }
                echo '</optgroup>';
                ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Excluir">
        </div>
    </form>
</body>

</html>
