<?php
    $local = "localhost";
    $admin = "root";
    $senha = "";
    $nome_bd = "estoque";
    $conexao = mysqli_connect($local, $admin, $senha, $nome_bd);
    if (!$conexao) {
        echo("Erro na conexão.");
    }

    $sql = "SELECT * FROM produto";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<h2>Lista de Produtos</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Nome</th><th>Valor</th><th>Quantidade</th></tr>";
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($linha["nome"]) . "</td>";
            echo "<td>R$ " . number_format($linha["valor"], 2, ',', '.') . "</td>";
            echo "<td>" . $linha["qtd"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum produto encontrado.";
    }

    mysqli_close($conexao);
?>