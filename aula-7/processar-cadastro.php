<?php
    $local = "localhost";
    $admin = "root";
    $senha = "";
    $nome_bd = "sistema";

    // Conexão com o BD.
    $conexao = mysqli_connect($local, $admin, $senha, $nome_bd);

    // Dados a serem cadastrados
    $login_usuario = $_POST["usuario"];
    $login_senha = $_POST["senha"];

    // Operação SQL que será realizada
    $sql = "INSERT INTO usuarios VALUES (?, ?)";

    $instrução_preparada = mysqli_prepare($conexao, $sql);

    // Faz a criptografia da senha
    // A função password_hash() gera um hash seguro da senha
    // O segundo parâmetro define o algoritmo de hash a ser usado
    $senha_criptografada = password_hash($login_senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($instrução_preparada, "ss", $login_usuario, $senha_criptografada);

    $resultado = mysqli_stmt_execute($instrução_preparada);
    if($resultado) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário.";
    }
?>