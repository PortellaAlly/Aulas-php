<?php

    // O superglobal $_FILES armazena informações sobre o arquivo enviado
    $arquivo = $_FILES['arquivo']; // Pega o arquivo enviado e coloca na variável $arquivo

    echo $arquivo["name"]."<br>"; // Apresenta o nome do arquivo
    echo $arquivo["tmp_name"]."<br>"; // Apresenta o nome temporário do arquivo
    echo $arquivo["size"]."<br>"; // Apresenta o tamanho do arquivo
    echo $arquivo["type"]."<br>"; // Apresenta o tipo do arquivo

    // Faz a leitura do conteúdo do arquivo
    $conteudo = file_get_contents($arquivo["tmp_name"]); // Salva o conteúdo do arquivo em uma cópia
    file_put_contents(__DIR__."/"."copia-".$arquivo["name"], $conteudo); // Salva uma cópia do arquivo na pasta atual
    echo $conteudo; // Exibe o conteúdo do arquivo
?>