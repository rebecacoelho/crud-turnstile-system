<?php
if (isset($_POST['submit'])) {
    // Se a foto foi enviada com sucesso
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Ler o arquivo enviado
        $foto_temp = $_FILES['foto']['tmp_name'];
        $foto_binario = addslashes(file_get_contents($foto_temp)); // Convertendo o arquivo em binário

        include_once('config.php');

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        // usuario ou convidado ?
        // Data de entrada e saída inserir no BD
        $telefone = $_POST['telefone'];
        $ativo = $_POST['ativo'];
        $data_nasc = $_POST['data_nascimento'];
        $instituicao = $_POST['instituicao'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios (nome, senha, email, cpf, telefone, ativo, data_nasc, instituicao, cidade, estado, endereco, foto)
        VALUES ('$nome', '$senha', '$email', '$cpf', '$telefone', '$ativo', '$data_nasc', '$instituicao', '$cidade', '$estado', '$endereco', '$foto_binario')");

        header('Location: login.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulário para Catraca</title>
    <style>
        body{
            background: black;
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="formulario.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><b>Formulário de Cadastro de Usuário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Status:</p>
                <input type="radio" id="ativo" name="ativo" value="ativo" required>
                <label for="ativo">Ativo</label>
                <br>
                <input type="radio" id="inativo" name="ativo" value="inativo" required>
                <label for="inativo">Inativo</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="instituicao" id="instituicao" class="inputUser" required>
                    <label for="instituicao" class="labelInput">Instituição</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="file" name="foto" id="foto" class="inputFile" required>
                    <label for="foto" class="labelInput">Insira uma foto do usuário</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>