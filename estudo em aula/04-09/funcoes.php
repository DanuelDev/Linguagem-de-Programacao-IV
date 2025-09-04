<?php
    //manipulação de strings
    $nome = "Daniel";
    echo "<p>Todas em maiúsculo: </p>".strtoupper("$nome"); // Formata uma string para maiúsculo
    echo "<p>Todas em minúsculo: </p>".strtolower("$nome"); // Formata um string para minúsculo
    echo "<p>Quantidade de caracteres: </p>".strlen($nome); // Quantidade de caracteres em uma string
    $posicao = strpos($nome, "e"); // Procura dentro de uma váriavel se há determinado caractere (retorna a posição do caractere/trecho/palavra dentro da variável)
    echo "<p>Caractere 'e' na posição $posicao</p>";
    
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    //Funções relacionada a datas
    date_default_timezone_set("America/Sao_Paulo"); // Configura para o horário de SP
    $data1 = date("d/m/Y"); // Dia atual(01-31) mês atual(01-12) e o ano atual
    echo "<p>Data atual: $data1</p>";
    $hora = date("H:i:s"); //Hora, minuto e segundo
    echo "<p>Hora: $hora</p>";
    if(checkdate(2, 30, 2025)){
        echo"<p>A data informada existe (30/02/2025)</p>";
    }else{
        echo"<p>A data informada não existe</p>";
    }
    
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Funções matemáticas
    $valor = -10;
    echo"<p>Valor absoluto:".abs($valor)."</p>";
    $valor2 = 5.9;
    echo "<p>Valor arredondado:".round($valor2)."</p>";
    $valor3 = rand(1, 100);
    echo"<p>Valor aleatório: $valor3</p>";
    echo"<P>Raiz quadrada de 16: ".sqrt(16)."</P>";
    $valor4 = 13.5;
    echo"<p>Valor formatado: R$".number_format($valor4, 2, ",", ".")."</p>"; //number_format($variavel, qnt de casas decimais, "separador de centenas", "separador de casas decimais)
    
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Criar funções
    //sempre criar uma função antes de usa-la
    function exibirSaudacao(){
        echo "<p>Hello World!</p>";
    }// comece sempre com letras minusculas, letras que compoem é com letras maiusculas
    exibirSaudacao(); //Função que não retorna nada: tipo Void

    function exibirSaudacaoComNome($nome){
        echo"<p>Seja bem vindo, $nome!</p>";
    }
    exibirSaudacaoComNome("Beatriz"); // sem retorno: tipo Void

    function menorValor($val1, $val2){
        return min($val1, $val2);
    }
    echo "<p>Menor valor entre 4 e 8: ".menorValor(4, 8)."</p>";// Função com retorno!

    function somarValores(...$numeros){
        return array_sum($numeros);
    }
    $soma = somarValores(1, 2, 3, 4, 5, 6);
    echo "<p>A soma dos valores é: $soma</p>";
?>