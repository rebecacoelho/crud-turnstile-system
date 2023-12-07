<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $ativo = $_POST['ativo'];
        $data_nasc = $_POST['data_nascimento'];
        $instituicao = $_POST['instituicao'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        
        $sqlInsert = "UPDATE usuarios 
        SET nome='$nome',senha='$senha',email='$email', cpf='$cpf', telefone='$telefone',ativo='$ativo',data_nasc='$data_nasc',instituicao='$instituicao',cidade='$cidade',estado='$estado',endereco='$endereco'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistema.php');

?>