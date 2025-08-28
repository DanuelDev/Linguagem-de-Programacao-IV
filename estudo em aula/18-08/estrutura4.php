<?php
include("cabecalho.php");

$i = 1;

while($i <= 5){
    echo "<p>Número $i</p>";
    $i++; #também há decremento
}

include("rodape.php");
?>