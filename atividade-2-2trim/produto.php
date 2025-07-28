<?php
session_start();

// Inicializar sessão se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
    $_SESSION['total_produtos'] = 0;
}

// Definir produtos disponíveis com URLs de imagens da web
$produtos = array(
    'produto-1' => array(
        'nome' => 'Smartphone Galaxy', 
        'preco' => 899.99, 
        'descricao' => 'Smartphone Android com 128GB de armazenamento',
        'imagem' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    ),
    'produto-2' => array(
        'nome' => 'Notebook Dell', 
        'preco' => 2299.99, 
        'descricao' => 'Notebook Intel i5 com 8GB RAM e SSD 256GB',
        'imagem' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    ),
    'produto-3' => array(
        'nome' => 'Fone Bluetooth', 
        'preco' => 199.99, 
        'descricao' => 'Fone de ouvido sem fio com cancelamento de ruído',
        'imagem' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    )
);

// Calcular total de produtos no carrinho
$total_itens = 0;
if (isset($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $quantidade) {
        $total_itens += $quantidade;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Loja Virtual</h1>
            <div class="carrinho-info">
                <p>Produtos no carrinho: <?php echo $total_itens; ?></p>
                <a href="carrinho.php" class="btn-carrinho">Ver Carrinho</a>
            </div>
        </header>

        <main>
            <h2>Nossos Produtos</h2>
            <div class="produtos-grid">
                <?php foreach ($produtos as $codigo => $produto): ?>
                    <div class="produto">
                        <div class="produto-imagem">
                            <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
                        </div>
                        <div class="produto-info">
                            <h3><?php echo $produto['nome']; ?></h3>
                            <p class="descricao"><?php echo $produto['descricao']; ?></p>
                            <p class="preco">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                            
                            <?php 
                            $quantidade_carrinho = isset($_SESSION['carrinho'][$codigo]) ? $_SESSION['carrinho'][$codigo] : 0;
                            if ($quantidade_carrinho > 0): 
                            ?>
                                <p class="quantidade-carrinho">Quantidade no carrinho: <?php echo $quantidade_carrinho; ?></p>
                            <?php endif; ?>
                            
                            <form method="POST" action="adicionar-produto.php" class="form-adicionar">
                                <input type="hidden" name="codigo_produto" value="<?php echo $codigo; ?>">
                                <div class="form-group">
                                    <label for="quantidade_<?php echo $codigo; ?>">Quantidade:</label>
                                    <input type="number" id="quantidade_<?php echo $codigo; ?>" name="quantidade" min="1" value="1" required>
                                </div>
                                <button type="submit" class="btn-adicionar">Adicionar ao Carrinho</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</body>
</html>