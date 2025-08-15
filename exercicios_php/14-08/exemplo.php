<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu primeiro PHP</title>
</head>
<body> 
    <?php # Será processado e transformado em HTML pelo servidor
        $dia = date('d'); # toda variável começa com $

        # php -S localhost:8080 (comando para iniciar o php no servidor local)
        # no navegador: localhost:8080/caminho/ate_o/php.php

        echo "<p> $dia </p>"; # use . para concatenação ou apenas aspas

        #https://vanessaborges2.github.io/Gerador-Formulario/

    ?>
    <h1>Hoje é dia <?= $dia?> de Agosto de 2025</h1>
</body>
</html>