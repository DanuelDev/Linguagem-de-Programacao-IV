<?php
    include("cabecalho.php");

    $i = 1;

    do{ # execura o laço antes de fazer a pergunta. Ou seja, executa, pelo menos, uma única vez
        echo "<p>Número $i</p>";
        $i++;
    } while($i <= 5);

    include("rodape.php");
?>