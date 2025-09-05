<?php
include("cabecalho.php");
?>
<!--Crie um programa em PHP que leia um valor e retorna a raiz quadrada desse número. -->
<div class="row forms_title">
    <h3>Exercício 6</h3>
</div>
<div class="row pt-2 justify-content-center">
    <div class="col-md-1">
        <label for="numero">Número</label>
        <input type="text" class="form-control forms_label" name="numero" id="numero">
    </div>
</div>
<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2 text-center">
        <button type="submit" class="btn btn-success">Arredondar</button>
    </div>
</div>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $numero = $_POST["numero"];

    if($numero != ""){
        if(is_numeric($numero)){
            function arredondaValor($numero){
                $resul = round($numero);
                return $resul;
            }

            echo'<div class="row pt-3 pb-3 text-center">';
            echo"<h3>$numero arredondado é ".arredondaValor($numero)."</h3>";
            echo'</div>';
            
        }else{
            // Erro variavel inválida
            echo'<div class="row pt-3 pb-3 text-center">';
            echo'<h3 class="error-message">Erro! Valor inválido inserido!</h3>';
            echo'</div>';
        }
    }else{
        // Erro variavel não inserida
        echo'<div class="row pt-3 pb-3 text-center">';
        echo'<h3 class="error-message">Erro! Valor não inserido!</h3>';
        echo'</div>';
    }
}
?>

<?php
include("rodape.php");
?>