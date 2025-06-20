<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cardápio Online</title>
    <style>
        .entrega-gratis {
            background-color: #c8e6c9; /* verde claro */
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }
        .entrega-paga {
            background-color: #fff9c4; /* amarelo claro */
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="lanche">Escolha o lanche:</label>
        <select name="lanche" id="lanche">
            <option value="xtudo">X-TUDO</option>
            <option value="xsalada">X-SALADA</option>
            <option value="xcalabresa">X-CALABRESA</option>
            <option value="xegg">X-EGG</option>
            <option value="xbacon">X-BACON</option>
        </select>

        <label for="quantidade">Indique a quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" min="1" required>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lanche = $_POST["lanche"];
        $quantidade = (int) $_POST["quantidade"];
        $preco = 0;
        $nomeLanche = "";

        switch ($lanche) {
            case "xtudo":
                $preco = 15.60;
                $nomeLanche = "X-Tudo";
                break;
            case "xsalada":
                $preco = 8.00;
                $nomeLanche = "X-Salada";
                break;
            case "xcalabresa":
                $preco = 10.20;
                $nomeLanche = "X-Calabresa";
                break;
            case "xegg":
                $preco = 9.10;
                $nomeLanche = "X-Egg";
                break;
            case "xbacon":
                $preco = 11.80;
                $nomeLanche = "X-Bacon";
                break;
        }

        $total = $preco * $quantidade;
        $taxaEntrega = 3.00;
        $entregaGratis = $total >= 45;

        echo "<h3>Resumo do Pedido</h3>";
        echo "<ul>";
        echo "<li>Lanche: $nomeLanche</li>";
        echo "<li>Quantidade: $quantidade</li>";
        echo "<li>Total a pagar = R$" . number_format($total, 2, ',', '.') . "</li>";
        echo "</ul>";

        if ($entregaGratis) {
            echo "<div class='entrega-gratis'>Taxa de Entrega Gratuita</div>";
        } else {
            $total += $taxaEntrega;
            echo "<div class='entrega-paga'>Taxa de Entrega = R$3,00</div>";
        }
    }
    ?>
</body>
</html>
