<?php 

    // Estabelecer a conexão com a base de dados
    // Este programa PHP insere as informações da imagem no banco de dados
    // Também faz uma cópia da imagem em um diretório no servidor
    $bd_local = "localhost";
    $bd_admin = "root";
    $bd_senha = "";
    $bd_nome = "bd-imagem";

    // Efetua a conexão com a base de dados
    $conexao = mysqli_connect($bd_local, $bd_admin, $bd_senha, $bd_nome);

    // Pega todos os arquivos de imagens enviados
    $imagens = $_FILES["imagens"];
    
    // Operação SQL
    $sql = "INSERT INTO imagem VALUES (?, ?, ?, ?)";

    // Diretório que armazenará as imagens enviadas
    $dir = "/imagens/";

    // Para cada arquivo de imagem enviado, faça:
    for($i = 0; $i < count($imagens["name"]); ++$i) {
        $nome = $imagens["name"][$i]; // Nome do arquivo da imagem
        $tipo = $imagens["type"][$i]; // Tipo do arquivo da imagem
        $conteudo = file_get_contents($imagens["tmp_name"][$i]); // Conteúdo (binário) da imagem
        // Move a imagem que está no dir temporário para o diretório imagens ($dir)
        move_uploaded_file($imagens["tmp_name"][$i], __DIR__.$dir.$imagens["name"][$i]);
        $instrucao_preparada = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($instrucao_preparada, "ssss", $nome, $tipo, $dir, $conteudo);
        mysqli_execute($instrucao_preparada);
    }

?>