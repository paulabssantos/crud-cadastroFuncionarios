<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="src/style.css">
    <title>Edição de cadastro - Tuti</title>
</head>

<?php
    session_start();
    
    include "connection.php";
    include "functions.php";

    expira_tempo($_SESSION);
    verifica_login($_SESSION);

    $id_edicao = isset($_GET["codigo"]) ? $_GET["codigo"]:"";
    $select = "SELECT * FROM funcionarios WHERE id = '$id_edicao'";
    $data = mysqli_query($connection, $select);
    $registro = mysqli_fetch_assoc($data);
    
    $id = isset($_POST["id"]) ? $_POST["id"]:"";
    $nome = isset($_POST["nome"]) ? $_POST["nome"]:"";
    $cpf = isset($_POST["cpf"]) ? $_POST["cpf"]:"";
    $setor = isset($_POST["setor"]) ? $_POST["setor"]:"";


    if(isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["setor"])){
        edit_data($id, $nome, $cpf, $setor, $connection);
    }
?>
<body>
    <div>
        <h1>Alteração de cadastro</h1>
        <form action="edit.php" method="POST" class="form">

            <input type="hidden" name="id" value="<?php echo $registro["id"];?>">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo $registro["nome"];?>"required>

            <label for="cpf">CPF</label>
            <input type="text" name="cpf" value="<?php echo $registro["cpf"];?>" required>

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
            <button type="submit" class="button-green">Salvar alterações</button>
        </form>
    </div>

    <br><a href="search.php"><button>Voltar</button></a>
</body>
</html>