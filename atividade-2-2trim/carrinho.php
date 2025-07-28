<?php
session_start();

// Definir produtos disponíveis com URLs de imagens da web (mesma estrutura da página de produtos)
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

// Verificar se existe carrinho na sessão
$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();

// Calcular total do carrinho
$total_carrinho = 0;
$total_itens = 0;

foreach ($carrinho as $codigo => $quantidade) {
    if (isset($produtos[$codigo])) {
        $total_carrinho += $produtos[$codigo]['preco'] * $quantidade;
        $total_itens += $quantidade;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Carrinho de Compras</h1>
            <div class="carrinho-info">
                <p>Total de itens: <?php echo $total_itens; ?></p>
                <a href="produto.php" class="btn-produtos">Continuar Comprando</a>
            </div>
        </header>

        <main>
            <?php if (empty($carrinho)): ?>
                <div class="carrinho-vazio">
                    <h2>Seu carrinho está vazio</h2>
                    <p>Adicione alguns produtos ao seu carrinho para continuar.</p>
                    <a href="produto.php" class="btn-voltar">Ver Produtos</a>
                </div>
            <?php else: ?>
                <h2>Itens no seu Carrinho</h2>
                <div class="carrinho-lista">
                    <table class="tabela-carrinho">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Preço Unitário</th>
                                <th>Quantidade</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($carrinho as $codigo => $quantidade): ?>
                                <?php if (isset($produtos[$codigo])): ?>
                                    <tr>
                                        <td>
                                            <div class="produto-carrinho">
                                                <img src="<?php echo $produtos[$codigo]['imagem']; ?>" alt="<?php echo $produtos[$codigo]['nome']; ?>">
                                                <div class="produto-detalhes">
                                                    <h4><?php echo $produtos[$codigo]['nome']; ?></h4>
                                                    <p><?php echo $produtos[$codigo]['descricao']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="preco">R$ <?php echo number_format($produtos[$codigo]['preco'], 2, ',', '.'); ?></td>
                                        <td class="quantidade"><?php echo $quantidade; ?></td>
                                        <td class="subtotal">R$ <?php echo number_format($produtos[$codigo]['preco'] * $quantidade, 2, ',', '.'); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="total-linha">
                                <td colspan="3"><strong>Total Geral:</strong></td>
                                <td class="total"><strong>R$ <?php echo number_format($total_carrinho, 2, ',', '.'); ?></strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="carrinho-acoes">
                    <a href="produto.php" class="btn-continuar">Continuar Comprando</a>
                    <button class="btn-finalizar" onclick="alert('Funcionalidade de finalizar compra não implementada nesta atividade.')">Finalizar Compra</button>
                </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>