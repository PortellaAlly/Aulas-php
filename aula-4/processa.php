<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processa PHP |ヾ(≧▽≦*)o</title>
</head>
<body>
    <?php
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        echo "<ul>";
        echo "<li>Email informado = ".$email."</li>";
        echo "<li>Senha informada = ".$senha."</li>";
        echo "</ul>";

    ?>
</body>
</html>