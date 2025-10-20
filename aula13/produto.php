<?php

    header('Content-Type: application/json; charset=utf-8');
    // localhost/aula13/produto.php?nome=''
    require_once("config/conexao.php");

    // Verifica se há um parâmetro e se existe um valor válido
    if(isset($_GET["nome"]) && $_GET["nome"] != "") {
        $nome_produto = "%".$_GET["nome"]."%";
        $sql = "SELECT * FROM produto WHERE nome LIKE ?";

        $instrucao_preparada = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($instrucao_preparada, "s", $nome_produto);
        mysqli_stmt_execute($instrucao_preparada);

        mysqli_stmt_bind_result($instrucao_preparada, $id_produto, $nome_produto, $preco_produto, $qtd_produto);
        
        $produtos = [];

        while($linha = mysqli_stmt_fetch($instrucao_preparada)) {
            $produtos[] = [
                "id" => $id_produto,
                "nome" => $nome_produto,
                "preco" => $preco_produto,
                "quantidade" => $qtd_produto
            ];
        }
        echo json_encode( $produtos);
    
    } 
    