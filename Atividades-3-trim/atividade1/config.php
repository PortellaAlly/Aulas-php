<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atividade</title>
        <?php
            if(isset($_FILES["arquivo"])){
                //Pega o arquivo
                $arquivo = $_FILES["arquivo"];
                //Leitura do arquivo
                $conteudo = file_get_contents($arquivo["tmp_name"]);
                $vetor = json_decode($conteudo, true);
            
        ?>
            <style>
                body{
                    background-color: <?php echo $vetor["bkg"]; ?>
                }
                h1{
                    color: <?php echo $vetor["h1"]; ?>
                }
            </style> 
        <?php } ?>

    </head>

    <body>
        <h1>Upload de arquivos</h1>
        <form action="config.php" method="POST" enctype="multipart/form-data">
            <label for="">Upload do arquivo</label>
            <input type="file" name="arquivo" accept=".json">
            <input type="submit">
        </form>
    </body>
</html>