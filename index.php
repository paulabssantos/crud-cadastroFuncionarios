<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="src/style.css">
    <title>Inicio - Tuti</title>
</head>
<?php
    $mensagem = isset($_GET["expired"])?"A sessão expirou!":"";
    echo $mensagem;
?>
<body>
    <h1 id="login-text">Login - Tuti</h1>
    <form action="homepage.php" method="POST" id="login">
        <label for="usuario">Usuário</label>
        <br><input type="text" name="usuario" required></input></br>
        <label for="senha">Senha</label>
        <br><input type="password" name="senha" required></input></br>
        <input type="hidden" name="hora_acesso" value=<?php echo time();?>></input>
        <br><button type="submit" class="button-green">Entrar</button>
    </form>
</body>
</html>