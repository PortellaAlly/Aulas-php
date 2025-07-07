<?php
    $local = "localhost";
    $admin = "root";
    $senha = "";
    $nome_bd = "estoque";

    // conexão com o BD
    $conexao = mysqli_connect($local, $admin, $senha, $nome_bd);

    $sql = "SELECT * FROM produto"; // Operação sendo realizada
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<h2>Lista de Produtos</h2>";
        echo "<table>";
        echo "<tr>    <th>Nome</th>    <th>Valor</th>    <th>Quantidade</th>    </tr>";
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha["nome"] . "</td>";
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
