<?php
include("cabecalho.php");
?>
<!--Escreva um programa que leia 7 números diferentes, imprima o menor
valor e imprima a posição do menor valor na sequência de entrada-->
<div class="row forms_title">
    <h3>Exercício 1</h3>
</div>
<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-1">
        <?php for($i=1; $i<=3; $i++): ?>
        <label for="num<?php echo $i?>">Número <?php echo $i;?></label>
        <input type="number" class="form-control forms_label" name="num<?php echo $i?>" id="num<?php echo $i?>">
        <?php endfor; ?>
        <button class="btn btn-success mt-4">Analisar!</button>
    </div>
    <div class="col-md-1">
        <?php for($i=4; $i<=7; $i++): ?>
        <label for="num<?php echo $i?>">Número <?php echo $i;?></label>
        <input type="number" class="form-control forms_label" name="num<?php echo $i?>" id="num<?php echo $i?>">
        <?php endfor; ?>
    </div>
    <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $lista = [];
        $erro = false;
        $mensagem_erro = "";

        // Coletar os números
        for ($i = 1; $i <=7; $i++){
            $campo = "num$i";
            if(isset($_POST[$campo]) && is_numeric($_POST[$campo])){
                $lista[] = $_POST[$campo];
            } else {
                $erro = true;
                $mensagem_erro = "Por favor, preencha todos os campos com números válidos.";
                break;
            }
        }
        
        if(!$erro){
            // Verifica se todos são diferentes
            if(count($lista) !== count(array_unique($lista))){
                $mensagem_erro = "Todos os números devem ser diferentes!";
                $erro = true;
            } else {
                // Encontra o menor valor e sua posição
                $menor_valor = $lista[0];
                $posicao_menor = 1;

                for($j = 1; $j < count($lista); $j++){
                    if($lista[$j] < $menor_valor){
                        $menor_valor = $lista[$j];
                        $posicao_menor = $j + 1;
                    }
                }
            }
        }
        
        // Exibir resultados ou erros
        if($erro){
            echo'<div class="row pt-3 pb-3 text-center">';
            echo"<h3 class='error-message'>Erro! $mensagem_erro</h3>";
            echo'</div>';
        } else {
            echo'<div class="row pt-3 pb-3 text-center">';
            echo"<h3>Menor número informado: $menor_valor</h3>";
            echo"<h3>Posição: $posicao_menor</h3>";
            echo'</div>';
        }
    }
    ?>
</div>

<?php
include("rodape.php");
?>