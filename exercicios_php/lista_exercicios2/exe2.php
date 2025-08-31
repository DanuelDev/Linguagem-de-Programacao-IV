<?php
include("cabecalho.php");
?>
<!--Escreva um programa para calcular a soma dos dois valores de entrada. Se
os dois valores forem iguais, retorne o triplo da soma-->
<div class="row forms_title">
    <h3>Exercício 2</h3>
</div>
<div class="row pt-3 justify-content-center">
    <div class="col-md-3">
        <label for="num1">Primeiro Número</label>
        <input type="text" class="form-control forms_label" name="num1" id="num1">
    </div>
    <div class="col-auto mt-4">
        <h4>+</h4>
    </div>
    <div class="col-md-3">
        <label for="num2">Segundo Número</label>
        <input type="text" class="form-control forms_label" name="num2" id="num2">
    </div>
</div>

<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2 text-center">
        <button type="submit" class="btn btn-success">Calcular!</button>
    </div>
</div>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Verifica se os campos foram enviados
    if(isset($_POST['num1']) && isset($_POST['num2'])){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $iguais = FALSE;
        
        // Verifica se os campos não estão vazios
        if($num1 !== "" && $num2 !== ""){
            // Verifica se são números válidos
            if(is_numeric($num1) && is_numeric($num2)){
                $soma = (float)$num1 + (float)$num2;
                // Verifica se ambas as entradas são iguais
                if($num1 == $num2){
                    $iguais = TRUE;
                    $soma = $soma * 2;
                }
                echo'<div class="row pt-3 pb-3 text-center">';
                echo    "<h3>Resultado: $soma</h3>";
                if($iguais){
                    echo "<label class = 'alert alert-success'>Números iguais, triplo da soma!</label>";
                }
                echo'</div>';
            }
            else{
                echo'<div class="row pt-3 pb-3 text-center error-message">';
                echo    '<h3 class="error-message">Por favor, informe números válidos!</h3>';
                echo'</div>';
            }
        }
        else{
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