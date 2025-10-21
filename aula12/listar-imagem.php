<?php
require_once "config/conexao.php";

$sql = "SELECT tipo, nome, conteudo, dir FROM imagem";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $tipo, $nome, $dados, $dir);

echo "<h2>Imagens Armazenadas</h2>";

while (mysqli_stmt_fetch($stmt)) {
    echo "<h3>$nome</h3>";
    echo "<img src='data:$tipo;base64," . base64_encode($dados) . "' width='220'><br>";
    echo "<img src='".$dir.$nome."' width='200'><hr>";
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>
