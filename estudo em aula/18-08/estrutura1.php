<?php
include("cabecalho.php"); # pega a estrutude de outro arquivo

$valor = 10;
# > maior
# < menor
# >= maior ou igual
# <= menor ou igual
# != diferente de
# == igual
# === diferente

# && = e
# || = ou
# ! = não
if($valor > 20){
  echo "valor maior ou igual que 20!";
} else{
  echo "valor menor ou igual que 20!";
}
include("rodape.php"); # pega de outro arquivo
?>