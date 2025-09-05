<?php
include("cabecalho.php");
?>
<!--Crie um programa em PHP em que sejam lidas duas palavras, e verifique se a segunda palavra está contida na primeira.-->
<div class="row forms_title">
    <h3>Exercício 3</h3>
</div>
<div class="row pt-2 justify-content-center">
    <div class="col-md-5">
        <label for="palavra1">Primeira palavra</label>
        <input type="text" class="form-control forms_label" name="palavra1" id="palavra1">
    </div>
    <div class="col-md-5">
        <label for="palavra2">Segunda palavra</label>
        <input type="text" class="form-control forms_label" name="palavra2" id="palavra2">
    </div>
</div>
<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2 text-center">
        <button type="submit" class="btn btn-success">Analisar</button>
    </div>
</div>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $palavra1 = $_POST["palavra1"];
    $palavra2 = $_POST["palavra2"];

    if($palavra1 != "" && $palavra2 != ""){
            function verificaIguais($string1, $string2){
                // Tratando das variaveis
                $string1 = strtolower($string1);
                $string2 = strtolower($string2);
                // Verifica se é TRUE ou FALSE
                if(is_int(strpos($string1, "$string2"))){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
            if(verificaIguais($palavra1, $palavra2)){
                echo'<div class="row pt-3 pb-3 text-center">';
                echo"<h3>Há a palavra '$palavra2' na palavra '$palavra1'</h3>";
                echo'</div>';
            }else{
                echo'<div class="row pt-3 pb-3 text-center">';
                echo"<h3>Não há a palavra' $palavra2' na palavra '$palavra1'</h3>";
                echo'</div>';
            }
            
    }else{
        // Erro variavel não inserida
        echo'<div class="row pt-3 pb-3 text-center">';
        echo'<h3 class="error-message">Erro! Nenhuma palavra inserida!</h3>';
        echo'</div>';
    }
}
?>

<?php
include("rodape.php");
?>