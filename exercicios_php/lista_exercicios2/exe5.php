<?php
include("cabecalho.php");
?>

<!--Faça um programa que leia o valor associado a um mês. Exemplo: 1 –
Janeiro, 2 – Fevereiro... Exiba o nome do mês associado = USE SWITCH-->
<div class="row forms_title">
    <h3>Exercício 5</h3>
</div>
<div class="row pt-3 justify-content-center">
    <div class="col-md-1">
        <label for="mes">Mês</label>
        <input type="text" class="form-control forms_label" name="mes" id="mes" placeholder = "Ex: 2">
    </div>
</div>

<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2 text-center">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mes = $_POST["mes"];
    if($mes != ""){
        if(is_numeric($mes)){
            echo'<div class="row pt-3 pb-3 text-center">';
            switch($mes){
                case 1:
                    echo "<h3>Mês: Janeiro</h3>";
                    break;
                case 2:
                    echo "<h3>Mês: Fevereiro</h3>";
                    break;
                case 3:
                    echo "<h3>Mês: Março</h3>";
                    break;
                case 4:
                    echo "<h3>Mês: Abril</h3>";
                    break;
                case 5:
                    echo "<h3>Mês: Maio</h3>";
                    break;
                case 6:
                    echo "<h3>Mês: Junho</h3>";
                    break;
                case 7:
                    echo "<h3>Mês: Julho</h3>";
                    break;
                case 8:
                    echo "<h3>Mês: Agosto</h3>";
                    break;
                case 9:
                    echo "<h3>Mês: Setembro</h3>";
                    break;
                case 10:
                    echo "<h3>Mês: Outubro</h3>";
                    break;
                case 11:
                    echo "<h3>Mês: Novembro</h3>";
                    break;
                case 12:
                    echo "<h3>Mês: Dezembro</h3>";
                    break;
                default:
                    echo "<h3 class='error-message'>Data inválida!</h3>";
            }
            echo'</div>';
        }else{
            // erro não-numerico
            echo'<div class="row pt-3 pb-3 text-center">';
            echo'<h3 class="error-message">Erro! Insira apenas números!</h3>';
            echo'</div>';
        }
    }else{
        // Erro valor não inserido
        echo'<div class="row pt-3 pb-3 text-center">';
        echo'<h3 class="error-message">Erro! Mês não inserido!</h3>';
        echo'</div>';
    }
}
?>

<?php
include("rodape.php");
?>