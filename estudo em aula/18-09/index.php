<?php
$valor = array(1, 2, 3, 4, 5);
echo "<p>Primeiro valor do vetor: ".$valor[0]."</p>";

#$v = $_POST["nome"]; método post é um vetor

$vetor = [1, 2, 3, 4, 5];
#função para exibir valores do vetor
var_dump($vetor);
echo "<br>";
echo "<br>";
print_r($vetor); # mais direto do que o var_dump

$vetor[4] = 6; # mudar o valor de uma posição
echo "<p>Novo valor na posição 4: ".$vetor[4]."</p>";

#$v = "nome";  ===> pensar nisso aqui para os exercicios
$vetor["nome"] = "Daniel";
echo "<br>";
print_r($vetor);

$valores = [
    "nome" => "Daniel",
    "Sobrenome" => "Horvath",
    "idade" => 24
];

echo "<br>";
echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-";
foreach($valores as $c => $v){
    echo "<p>Posição: $c = Valor $v</p>"; #$c = índece | $v = valor do índice
};
?>