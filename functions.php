<?php

    //Cadastrar novo colaborador
    function insert_data($nome, $cpf, $setor, $connection)
    {
        $verifica_cpf = mysqli_query($connection,"SELECT * FROM funcionarios WHERE cpf = '$cpf'");
        $insert = "INSERT INTO `funcionarios`(`nome`, `cpf`, `setor`) VALUES ('$nome','$cpf','$setor')";
        
        //Verifica se o cpf inserido já está cadastrado 
        if(mysqli_num_rows($verifica_cpf) == 0)
        {
            mysqli_query($connection, $insert);
            echo "<script>alert('Funcionário cadastrado com sucesso!');window.location='register.php'</script>";
        }else
        {
            echo "<script>alert('Funcionário já cadastrado!');window.location='register.php'</script>";
        }
    }

    //Filtro por setor
    function filter_data($pesquisa, $connection)
    {
        $select = "SELECT * FROM funcionarios";
        
        //Se não for selecionado nenhum setor, a tabela a ser retornada é com todos os setores inclusos 
        if($pesquisa != "0")
        {
            $select .= " WHERE setor = '$pesquisa'";
        }
        
        $data = mysqli_query($connection,$select);
        
        while($registro = mysqli_fetch_assoc($data))
        {
            $id = $registro["id"];
            $nome = $registro["nome"];
            $cpf = $registro["cpf"];
            $setor = $registro["setor"];
            
            echo "<tr>
                    <th>$nome</th>
                    <td>$cpf</td>
                    <td>$setor</td>
                    <td>
                        <a href='edit.php?codigo=$id'><button class='button-green'>Editar</button></a>
                        <a href='search.php?codigo=$id&delete='y'''><button class='button-red'>Excluir</button></a>
                    </td>
                </tr>";
            }
        }

        //Editar dados cadastrados
        function edit_data($id, $nome, $cpf, $setor, $connection)
        {
            $verifica_cpf = mysqli_query($connection,"SELECT * FROM funcionarios WHERE cpf = '$cpf' AND id !='$id'");
            $update = "UPDATE `funcionarios` SET `nome` = '$nome', `cpf` = '$cpf', `setor` = '$setor' WHERE id = '$id'";
            if(mysqli_num_rows($verifica_cpf) == 0)
            {
            mysqli_query($connection, $update);
            echo "<script>alert('Alterações feitas com sucesso!');window.location='search.php';</script>";
            }
            else
            {
            echo "<script>alert('Funcionário já cadastrado!');window.location='search.php'</script>";
            }
        }
        
        //Deletar cadastro
        function delete_data($id, $connection)
        {
            $delete = "DELETE FROM `funcionarios` WHERE id = '$id'";
            mysqli_query($connection,  $delete);
        }

        
        //Voltar para a tela de início passando todos os dados da sessão através de um form
        function voltar_homepage(){
            echo "<form action='homepage.php' method='POST'>
        <input type='hidden' name='usuario' value=". $_SESSION['usuario']. "></input>
        <input type='hidden' name='senha' value=".$_SESSION['senha']."></input>
        <input type='hidden' name='hora_acesso' value=".$_SESSION['hora_acesso']."></input>
        <button type='submit'>Voltar</button>
    </form>";
        }

        //Verifica se o usuário e senha inseridos estão corretos e não-vazios
        function verifica_login($dados_login){
            if(empty($dados_login["usuario"]) || empty($dados_login["senha"])){
                die("Você precisa inserir todos os dados para logar!");
                header("Location: http://localhost/DESAFIO/index.php");
            }
            if($dados_login["usuario"] != "tuti" || $dados_login["senha"] != "123"){
                die("Dados incorretos!");
            }
            $_SESSION["usuario"] = $dados_login["usuario"];
            $_SESSION["senha"] = $dados_login["senha"];
            $_SESSION["hora_acesso"] = $dados_login["hora_acesso"];
        }
        
        //Se o tempo de sessão for maior que 30min, a sessão deve ser expirada
        function expira_tempo($hora_acesso){
            $tempo_atual = time() - $hora_acesso['hora_acesso'];
            echo "<div id='tempo_sessao'>Tempo de sessão: " . date("i:s",$tempo_atual) ."</div>";
            if ($tempo_atual > 1800){
                header("Location: http://localhost/DESAFIO/index.php?expired='y'");
                session_destroy();
            }  
        }
?>