<?php
    // dados do BD
    $local = "localhost";
    $admin = "root";
    $senha = "";
    $nome_bd = "estoque";

    $conexao = mysqli_connect($local, $admin, $senha, $nome_bd); // conexão com o BD

    $nome = $_POST["nome"]; // variáveis setadas lá atrás no cadastro-produto.html
    $valor = $_POST["valor"];
    $qtd = $_POST["qtd"];
    
    $sql = "INSERT INTO produto (nome, valor, qtd) VALUES (?, ?, ?)"; // Operação realizada
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sdi", $nome, $valor, $qtd);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt)> 0){
        echo "Produto cadastrado com sucesso!";

    }else{
        echo "Erro ao cadastrar o produto";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    ?>
