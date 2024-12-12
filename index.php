<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <title>VetPet</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/stylelogin.css">
</head>

<body>
    <img class="logo" src="logob.png" alt="logo" width="96px" height="auto">
    <header>
        <h1>VetPet</h1>
    </header>
    <div class="container">
        <main>
            <div class="form-box">
                <h2>Acessar Conta:</h2>
                <form action="#">
                    <label for="email">Email:</label>
                    <input type="email" id="email" placeholder="Digite seu email" required>

                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" placeholder="Digite sua senha" required>

                    <div class="actions">
                        <button type="submit">Entrar</button>
                        <a href="#" class="link">Recuperar senha</a>
                    </div>
                </form>
            </div>
            <a href="form-cadastro.html" class="no-account">Não possui conta?</a>
        </main>
        <footer>
            <p>Sistema de gerenciamento de clínica veterinária</p>
        </footer>
    </div>
</body>

</html>