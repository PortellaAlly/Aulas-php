<?php
    $bd_local = "localhost";
    $bd_admin = "root";
    $bd_senha = "";
    $bd_nome = "bd-imagem";

    $conexao = mysqli_connect($bd_local, $bd_admin, $bd_senha, $bd_nome);
    $sql = "SELECT * FROM imagem";
    $resposta = mysqli_query($conexao, $sql);
    $imagens = array();
    while($linha = mysqli_fetch_assoc($resposta)) {
        $imagens[] = $linha;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listar Imagens</h1>
    <?php 
        for($i = 0; $i < count($imagens); ++$i) { ?>
            <div> 
                <p>Nome: <?php echo $imagens[$i]["name"]; ?></p>
                <img src = "<?php echo "."$imagens[$i]["dir"].$imagens[$i]["nome"]; ?>">
            </div>
    <?php
        }
    ?>

</body>
</html>