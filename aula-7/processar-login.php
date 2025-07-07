<?php

    $local = "localhost";
    $admin = "root";
    $senha = "";
    $nome_bd = "sistema";

    // Conexão com o BD.
    $conexao = mysqli_connect($local, $admin, $senha, $nome_bd);

    // Leitura dos dados do formulário
    $login_usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
    $login_senha = isset($_POST["senha"]) ? $_POST["senha"] : '';

    // Forma  incorreta de ser feita pois possibilita SQL Injection
    // injeção sql é quando um usuário mal intencionado consegue manipular o banco de dados 
    // $sql = "SELECT * FROM usuarios WHERE nome='".$login_usuario."' AND senha='".$login_senha."'";
    // $login_senha."'";

    // Forma correta de ser feita, utilizando prepared statements
    // criando a instrução preparada
    $sql = "SELECT * FROM usuarios WHERE nome=?";
    $instruçãopreparada = mysqli_prepare($conexao, $sql);

    // vinculando os valores dos parâmetros do SQL na instrução preparada
    mysqli_stmt_bind_param($instruçãopreparada, "s", $login_usuario);

    // executando a instrução preparada
    mysqli_stmt_execute($instruçãopreparada);

    // vinculando os valores retornados pela operação em variáveis
    mysqli_stmt_bind_result($instruçãopreparada, $usuario_encontrado, $senha_encontrada);

    // Pegando o primeiro resultado e colocando nas variáveis de vinculação
    mysqli_stmt_fetch($instruçãopreparada);

    // Obtendo o número de linhas obtidas a partir da consulta realizada
    // $contador = mysqli_num_rows($resposta);
    if($login_usuario == $usuario_encontrado && password_verify($login_senha, $senha_encontrada)) {
        echo "Login efetuado";
    } else {
        echo "Usuário não cadastrado";
    }
?>