<?php
    $local = "localhost";
    $admin = "root";
    $senha = "";
    $nome_bd = "estoque";

    // Conexão com o BD.
    $conexao = mysqli_connect($local, $admin, $senha, $nome_bd);

    // Dados a serem cadastrados
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];
    $quantidade = $_POST["quantidade"];

    // Operação SQL que será realizada
    $sql = "INSERT INTO usuarios VALUES (?, ?, ?)";

    $instrução_preparada = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($instrução_preparada, "ss", $login_usuario, $senha_criptografada);

    $resultado = mysqli_stmt_execute($instrução_preparada);
    if($resultado) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário.";
    }
?>