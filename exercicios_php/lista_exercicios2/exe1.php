<?php
include("cabecalho.php");
$lista = [];
$i = 1;
?>
<div class="row forms_title">
    <h3>Exercício 1</h3>
</div>
<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2">
        <label for="num">Número</label>
        <input type="number" class="form-control forms_label" name="num" id="num">
    </div>
    <div class="col-md-2 text-center mt-4">
        <button class="btn btn-success">Calcular!</button>
    </div>
</div>

<?php
 #Escreva um programa que leia 7 números diferentes, imprima o menor
#valor e imprima a posição do menor valor na sequência de entrada.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $num = $_POST["num"];
    if($num != ""){
        $lista = $num;
        $i++;

        echo "Número escolhidos: ";
        if($i == 7){
            echo "$lista";
        }
    }
}
include("rodape.php");
?>