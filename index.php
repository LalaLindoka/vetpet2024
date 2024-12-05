<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylelogin.css">
    <title>Login</title>
</head>
<body>
<div class="title-container">
    <h1 class="title">VetPet</h1>
</div>
    <div class="logo">
        <img src="logob.png" alt="Logo VetPet">
    </div>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="email">Email: 
                <input type="text" name="email">
            </label><br>
            <label for="senha">Senha: 
                <input type="password" name="senha">
            </label><br>
            <input type="submit" value="Enviar">
        </form>
        <div class="links">
            <a href="form-recuperar-senha.php">Recuperar Senha</a>
            <a href="form-cadastrar.php" class="register-link">Não possui conta?</a>
        </div>
    </div>
</body>
</html>
