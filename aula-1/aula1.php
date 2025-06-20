<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aula - 1 😁😁</title>
</head>
<body>
    <h1>
        <?php
        echo "Aula - 1"; // Comando para apresentar informações 
        ?>
    </h1>
    <h1>
        Variaveis em PHP:
    </h1>

    <p>
        <?php
            $numero = 12; // Tipo inteiro - As variaveis tem auto-tipagem
            echo "O número é igual ".$numero;
            $nome = "Allyso"; // String
            $decimal = 1.34; // Decimal0
            $Verdadeiro = true; // Boolean
            $precoProduto = 4.50;
            $preco = 5;
        ?>
    </p>

    <h1>
         Constantes em PHP:
    </h1>
        <p>
            <?php
                const PI = 3.1415; // Valor de pi - Constantes NÃO precisam do "$", somente variaveis.
                define("FORCAG",9.81);
                echo "Constantes: PI = ".PI.". Gravidade = ".FORCAG;
            ?>
        </p>
    
    <h1>
         Vetores em PHP:
    </h1>
    
    <p>
        <?php
            $frutas = ["uva", "abacaxi", "pera"];
            echo "Fruta no índice 0 = ".$frutas[0]."<br>";

            //vetor associativo
            $produtos = ["12" => "caneta", "34" => "borracha"];
            echo $produtos["12"];
        ?>
    </p>

    <h1> Operadores Aritméticos e Booleanos </h1>
    <ul>
        <?php
        echo "<li>Soma: ".($decimal + $precoProduto)."</li>";
        echo "<li>Subtração: ".($decimal - $precoProduto)."</li>";
        echo "<li>Divisão: ".($decimal / $precoProduto)."</li>";
        echo "<li>Multiplicação: ".($decimal * $precoProduto)."</li>";
        echo "<li>Decimal eh maior que Preço do produto?: ".($decimal > $precoProduto ?"Verdadeiro":"Falso")."</li>";
        ?>
    </ul>
    <h1> Estruturas Condicionais </h1>
    <p>if/else</p>
    <?php
        if($preco > $precoProduto) { // Caso a condição seja verdadeira
            echo "Decimal é maior do que o preço do produto";
        } else { // Caso contrário
            echo "Decimal é menor do que o preço do decimal";
        }
    ?>

<p>switch/Case</p>
    <?php
        $opcao = 1;
        switch ($opcao) {
            case 1:
                echo ("Opção 1 escolhida");
                break;
            case 2:
                echo ("Opção 2 escolhida");
                break;
            
            default:
                echo "Opção inválida";
        }
    ?>
    <h1> Estruturas de Repetição </h1>
    <p> Estrutura for </p>
    <?php
        for($i = 0; $i <= 10; ++$i) {
            echo $i. " - ";
        }
    ?>

    <p> Estrutura While </p>
    <?php
        $contador = 0;
        while ($contador <= 20) {
            if($contador % 2 == 0) {
                echo " ".$contador;
            }
            ++$contador;
        }
    ?>

    <p> Foreach - é interessante de ser usado quando o vetor é associativo</p>
    <?php
        $vetor = ["12" => "Allyson ", "98" => "Vito ", "77" => "baiano "];
        foreach ($vetor as $id => $valores) {
            echo $id." ".$valores;
        }
    ?>
</body>
</html>