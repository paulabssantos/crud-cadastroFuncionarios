<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="src/style.css">
    <title>Cadastro - Tuti</title>
</head>
<?php  
    session_start();

    include "connection.php";
    include "functions.php";

    expira_tempo($_SESSION);
    verifica_login($_SESSION);

    $nome = isset($_POST["nome"]) ? $_POST["nome"]:"";
    $cpf = isset($_POST["cpf"]) ? $_POST["cpf"]:"";
    $setor = isset($_POST["setor"]) ? $_POST["setor"]:"";


    if(isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["setor"])){
        insert_data($nome, $cpf, $setor, $connection);
    }
  ?>
<body>
    <div>
    <h1>Cadastro</h1>

    <form action="register.php" method="POST" class="form">
        <label for="nome">Nome</label>
        <input type="text" name="nome" required>


        <label for="cpf">CPF</label>
        <input type="text" name="cpf" required>


        <label for="setor">Setor</label>
        <select name="setor">
            <option value="DEPARTAMENTO PESSOAL">DEPARTAMENTO PESSOAL</option>
            <option value="TI">TI</option>
            <option value="PRODUÇÃO">PRODUÇÃO</option>
            <option value="ENGENHARIA">ENGENHARIA</option>
            <option value="SESMT">SESMT</option>
            <option value="ALMOXARIFADO">ALMOXARIFADO</option>
        </select>
<br>
        <button type=submit class="button-green">Cadastrar</button>

    </form> 
    
    <br>
    <?php
        voltar_homepage();
    ?>
    </div>
</body>
</html>