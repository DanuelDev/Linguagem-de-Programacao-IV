<?php
include("cabecalho.php");
?>

<!--Faça um algoritmo PHP que receba os valores A e B, imprima-os em ordem
crescente em relação aos seus valores. Caso os valores sejam iguais,
informar o usuário e imprimir o valor em tela apenas uma vez.
Exemplo, para A=5, B=4 você deve imprimir na tela: "4 5".-->
<div class="row forms_title">
    <h3>Exercício 3</h3>
</div>
<div class="row pt-3 justify-content-center">
    <div class="col-md-1">
        <label for="valA">Valor A</label>
        <input type="text" class="form-control forms_label" name="valA" id="valA">
    </div>
    <div class="col-md-1">
        <label for="valB">Valor B</label>
        <input type="text" class="form-control forms_label" name="valB" id="valB">
    </div>
</div>

<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2 text-center">
        <button type="submit" class="btn btn-success">Analisar!</button>
    </div>
</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Verifica se os campos foram enviados e não é NULL
    if(isset($_POST['valA']) && isset($_POST['valB'])){
        $valA = $_POST["valA"];
        $valB = $_POST["valB"];
        // Verifica se os campos foram preenchidos
        if($valA != "" && $valB != ""){
            // Verifica se o valor no campo é númerico
            if(is_numeric($valA) && is_numeric($valB)){
                //Verifica valores
                echo'<div class="row pt-3 pb-3 text-center alert alert-success">';
                if($valA > $valB){
                    echo    "<h3>Resultado: [$valB, $valA]</h3>";
                } elseif($valB > $valA){
                    echo    "<h3>Resultado: [$valA, $valB]</h3>";
                }else{
                    echo    "<h3>Ambos iguais: $valA!</h3>";
                }
                echo'</div>';
                }else{
                    echo'<div class="row pt-3 pb-3 text-center">';
                    echo    '<h3 class="error-message">Por favor, informe apenas números!</h3>';
                    echo'</div>';
                }
        }else{
            echo'<div class="row pt-3 pb-3 text-center">';
            echo    '<h3 class="error-message">Por favor, informe os dois números!</h3>';
            echo'</div>';
        }
    }
}
?>

<?php
include("rodape.php");
?>