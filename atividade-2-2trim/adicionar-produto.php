<?php
session_start();

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Receber os dados do formulário
    $codigo_produto = $_POST['codigo_produto'];
    $quantidade = intval($_POST['quantidade']);
    
    // Validar se a quantidade é válida
    if ($quantidade > 0) {
        
        // Inicializar carrinho se não existir
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }
        
        // Adicionar ou atualizar a quantidade do produto no carrinho
        if (isset($_SESSION['carrinho'][$codigo_produto])) {
            $_SESSION['carrinho'][$codigo_produto] += $quantidade;
        } else {
            $_SESSION['carrinho'][$codigo_produto] = $quantidade;
        }
        
        // Atualizar o total de produtos no carrinho
        $_SESSION['total_produtos'] = 0;
        foreach ($_SESSION['carrinho'] as $qtd) {
            $_SESSION['total_produtos'] += $qtd;
        }
        
        // Definir mensagem de sucesso
        $_SESSION['mensagem'] = "Produto adicionado ao carrinho com sucesso!";
        
    } else {
        // Definir mensagem de erro
        $_SESSION['erro'] = "Quantidade inválida!";
    }
    
} else {
    // Se não foi POST, definir mensagem de erro
    $_SESSION['erro'] = "Acesso inválido!";
}

// Redirecionar de volta para a página de produtos
header('Location: produto.php');
exit();
?>