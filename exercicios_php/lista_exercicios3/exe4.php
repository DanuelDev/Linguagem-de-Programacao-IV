<?php
include("cabecalho.php");
?>
<!--Crie um programa em PHP que leia três valores: dia, mês e ano. Verifique se
 a data informada é válida e apresente a data em formato dd/mm/YYYY. -->
<div class="row forms_title">
    <h3>Exercício 4</h3>
</div>
<div class="row pt-2 justify-content-center">
    <div class="col-md-1">
        <label for="dia">Dia</label>
        <input type="text" class="form-control forms_label" name="dia" id="dia">
    </div>
    <div class="col-md-1">
        <label for="mes">Mês</label>
        <input type="text" class="form-control forms_label" name="mes" id="mes">
    </div>
    <div class="col-md-1">
        <label for="ano">Ano</label>
        <input type="text" class="form-control forms_label" name="ano" id="ano">
    </div>
</div>
<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2 text-center">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $dia = $_POST["dia"];
    $mes = $_POST["mes"];
    $ano = $_POST["ano"];
    
        if($dia != "" && $mes != "" && $ano != ""){
            if(is_numeric($dia) && is_numeric($mes) && is_numeric($ano)){
                function verificaData($data_dia, $data_mes, $data_ano){
                    // Verificação
                    if(checkdate($data_mes, $data_dia, $data_ano)){
                        return TRUE;
                    }
                    else{
                        return FALSE;
                    }
                }
                if(verificaData($dia, $mes, $ano)){
                    echo'<div class="row pt-3 pb-3 text-center">';
                    echo"<h3>$dia/$mes/$ano é uma data válida!</h3>";
                    echo'</div>';
                }else{
                    echo'<div class="row pt-3 pb-3 text-center">';
                    echo"<h3>$dia/$mes/$ano <strong>NÃO É</strong> uma data válida!</h3>";
                    echo'</div>';
                }
                
        }else{
            // Erro variavel inválida
            echo'<div class="row pt-3 pb-3 text-center">';
            echo'<h3 class="error-message">Erro! Data inserida inválida!</h3>';
            echo'</div>';
        }
    }else{
            // Erro variavel não inserida
            echo'<div class="row pt-3 pb-3 text-center">';
            echo'<h3 class="error-message">Erro! Data inserida incompleta!</h3>';
            echo'</div>';
        }
}
?>

<?php
include("rodape.php");
?>