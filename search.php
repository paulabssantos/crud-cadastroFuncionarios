<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="src/style.css">
    <title>Colaboradores - Tuti</title>
</head>
<?php
    
    session_start();

    include "connection.php";
    include "functions.php";        

    expira_tempo($_SESSION);
    verifica_login($_SESSION);
    

    $delete = isset($_GET["delete"])?$_GET["delete"]:"";
    $id = isset($_GET["codigo"])?$_GET["codigo"]:"";

    if(isset($_GET["delete"])){
       delete_data($id, $connection);
    }
?>
<body>
    <h1>Colaboradores</h1>
        
        <form action="search.php" method="POST">
            <label for="filtroSetor">Setor</label>
            <select name="pesquisa">
                <option value="0" selected>TODOS</option>
                <option value="DEPARTAMENTO PESSOAL">DEPARTAMENTO PESSOAL</option>
                <option value="TI">TI</option>
                <option value="PRODUÇÃO">PRODUÇÃO</option>
                <option value="ENGENHARIA">ENGENHARIA</option>
                <option value="SESMT">SESMT</option>
                <option value="ALMOXARIFADO">ALMOXARIFADO</option>
        </select>

        <button type="submit">Buscar</button>
        </form>
    </form>

    <br>

    <div>
        <table border="1" width="100%">
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Setor</th>
                <th>Ação</th>
            </tr>

            <?php
                $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"]:"0";

                if(isset($_POST["pesquisa"]) || $pesquisa  == "0"){
                    filter_data($pesquisa,$connection);
                }
            ?>
        </table>
    </div>   
    <br>
<?php
voltar_homepage();
?>
</body>
</html>