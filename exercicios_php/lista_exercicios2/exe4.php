<?php
include("cabecalho.php");
?>

<!--Faça um programa em PHP onde o valor de um produto é informado. Se
esse valor for superior a R$100,00 deve ser aplicado um desconto de 15%
sobre ele e exibido o novo valor do produto.-->

<div class="row forms_title">
    <h3>Exercício 4</h3>
</div>
<div class="row pt-3 justify-content-center">
    <div class="col-md-2">
        <label for="val_produto">Valor do produto</label>
        <div class="input-group">
            <span class="input-group-text">R$</span>
            <input type="text" class="form-control forms_label" name="val_produto" id="val_produto">
        </div>
    </div>
</div>

<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2 text-center">
        <button type="submit" class="btn btn-success">Analisar!</button>
    </div>
</div>

<?php
// Checa se o campo foi enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $val_produto = $_POST["val_produto"];
    // Checa se o campo está vazio
    if($val_produto != ""){
        if(is_numeric($val_produto)){
            // Checa se o valor é passivel de desconto
            if($val_produto >= 100){
                $desconto = $val_produto * 0.15;
                $total = $val_produto - $desconto;

                echo '<div class="row pt-3 pb-3 text-center alert alert-success">';
                echo '<h3>Oba! o seu desconto foi <strong>APROVADO!</strong></h3>';
                echo "<h3>Descontro aplicado: R$$desconto</h3>";
                echo "<h3>Total: R$$total</h3>";
                echo '</div>';
            }elseif($val_produto <= 0){
                //Erro valor inválido
                echo'<div class="row pt-3 pb-3 text-center">';
                echo'<h3 class="error-message">Erro! Apenas valores maiores que R$0 são válidos!</h3>';
                echo'</div>';
            }
            else{
                $faltante = 100 - $val_produto;
                echo'<div class="row pt-3 pb-3 text-center">';
                echo'<h3 class="error-message">Atenção! Desconto <strong>não aprovado!</strong></h3>';
                echo"<h3 class='error-message'>Coloque mais R$$faltante para receber 15% de desconto!</h3>";
                echo'</div>';
            }
        }
        else{
            // erro não-numerico
            echo'<div class="row pt-3 pb-3 text-center">';
            echo'<h3 class="error-message">Erro! Insira apenas números!</h3>';
            echo'</div>';
        }
    }
    else{
        //erro vazio
        echo'<div class="row pt-3 pb-3 text-center">';
        echo'<h3 class="error-message">Erro! Valor não inserido!</h3>';
        echo'</div>';
    }
}
?>

<?php
include("rodape.php");
?>