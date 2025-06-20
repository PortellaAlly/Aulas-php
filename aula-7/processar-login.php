<?php

    $local = "localhost";
    $admin = "root";
    $senha = "";
    $nome_bd = "sistema";

    // Conexão com o BD.
    $conexao = mysqli_connect($local, $admin, $senha, $nome_bd);

    // Leitura dos dados do formulário
    $login_usuario = $_POST["usuario"];
    $login_senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE nome='".$login_usuario."' AND senha='".$login_senha."'";

    $resposta = mysqli_query($conexao, $sql);

    // Obtendo o número de linhas obtidas a partir da consulta realizada
    $contador = mysqli_num_rows($resposta);
    if($contador > 0){
        echo "Login efetuado";
    } else {
        echo "Usuário não cadastrado";
    }
?>