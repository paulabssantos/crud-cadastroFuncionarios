<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="src/style.css">
    <title>Cadastro de colaboradores - Tuti</title>
</head>
<?php
    session_start();
    
    include "functions.php";

    $dados_login = $_POST;

    verifica_login($dados_login);

    echo "<body>
    <div id='homepage'>
    <h1 class='titulo'>Cadastro de colaboradores</h1><br>
    <p>Esse é o sistema de cadastro de colaboradores da Tuti.</p>
    <p>Selecione o que deseja fazer: </p>

    <br>

    <a href='register.php'><button class='button-green'>Cadastrar</button></a>
    <a href='search.php'><button class='button-green'>Visualizar colaboradores</button></a>

    <br>

    <br><a href='logout.php'><button>Logout</button></a>
    </div>
</body>";

    expira_tempo($dados_login);
?>
</html>