
  <?php
    include("cabecalho.php");
    echo "<p>Esta é a página 2</p>";

    $valor = 10;

    if($valor > 20){
    echo "valor maior ou igual que 20!";
    }elseif($valor < 10){
        echo "valor menor que 10";
    }
    else{
    echo "valor igual a 10!";
    }

    include("rodape.php");