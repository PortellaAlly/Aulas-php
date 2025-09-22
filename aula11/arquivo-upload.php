<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Upload de Arquivos</title>
</head>
<body>
    <form  action="processar-arquivo.php" method="POST" enctype="multipart/form-data">
        <label> faça o upload do arquivo</label>
        <input type="file" name="arquivo" accept=".txt">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>