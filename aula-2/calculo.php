<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Requisições GET</title>
    </head>

    <body>
        <h1> Aula - Requisições GET </h1>
        <?php
            // Receber os dados informados via GET
            $numeroA = $_GET["a"];
            $numeroB = $_GET["b"];
            echo "A = ".$numeroA." B = ".$numeroB;
        ?>

        <h3>Pares</h3>
        <?php
            if($numeroA % 2 == 0) {
                echo "A é par ";
            }
            if($numeroB % 2 == 0) {
                echo "B é par ";
            }
            if($numeroA % 2 !== 0 && $numeroA % 2 !== 0) {
                echo "Nenhum é par";
            }
        ?>
        <h3> Soma dos números</h3>
        <?php 
            echo "A soma de A e B = ".($numeroA + $numeroB);
        ?>

        <h3>Números inteiros inteiros entre os números informados</h3>
        <ul>
            <?php
                $menor = $numeroA > $numeroB ? $numeroB : $numeroA; // Pega o menor número
                $maior = $numeroA < $numeroB ? $numeroB : $numeroA; // Pega o maior número
                for ($i = $menor + 1; $i < $maior; ++$i) {
                    echo "<li>".$i."</li>";
                }
            ?>
        </ul>

        <h3>Maior, Menor e Iguais</h3>
        <?php
            if($menor == $maior) {
                echo "São iguais";
            } else{
                echo "Maior = ".$maior." Menor = ".$menor;
            }
        ?>
    </body>
</html>