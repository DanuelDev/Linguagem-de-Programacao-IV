<?php
include("cabecalho.php");
?>
<!--Crie um programa em PHP em que seja lida uma palavra e ela seja apresentada com seus caracteres em maiúsculo e minúsculo.-->
<div class="row forms_title">
    <h3>Exercício 2</h3>
</div>
<div class="row pt-2 justify-content-center">
    <div class="col-md-1">
        <label for="palavra">Palavra</label>
        <input type="text" class="form-control forms_label" name="palavra" id="palavra">
    </div>
</div>
<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2 text-center">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $palavra = $_POST["palavra"];

    if($palavra != ""){
        function formatarPalavraMaiusculo($string){
            $formatado = strtoupper("$string");
            return $formatado;
        }

        function formatarPalavraMinusculo($string){
            $formatado = strtolower("$string");
            return $formatado;
        }

        echo'<div class="row pt-3 pb-3 text-center">';
        echo"<h3>Em maiúsculo: ".formatarPalavraMaiusculo($palavra)."</h3>";
        echo"<h3>Em minúsculo: ".formatarPalavraMinusculo($palavra)."</h3>";
        echo'</div>';
    }else{
        // Erro variavel não inserido
        echo'<div class="row pt-3 pb-3 text-center">';
        echo'<h3 class="error-message">Erro! Nenhuma palavra inserida!</h3>';
        echo'</div>';
    }
}
?>

<?php
include("rodape.php");
?>