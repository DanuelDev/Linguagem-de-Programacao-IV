<?php
include("cabecalho.php");
?>
<!--Crie um formulário para que o usuário informe um número. Use um loop
for para imprimir todos os números de 1 até o número informado.-->
<div class="row forms_title">
    <h3>Exercício 6</h3>
</div>
<div class="row pt-3 text-left justify-content-center">
    <div class="col-auto alert alert-warning">
        <p><strong>ATENÇÃO!</strong> Números muitos altos podem causar lentidão e travamentos.</p>
        <p>Por segurança, é aconselhável não digitar números que ultrapassem 100.000.</p>
        <p>Números com casas decimais serão arredondados para baixo.</p>
    </div>
</div>
<div class="row pt-2 justify-content-center">
    <div class="col-md-1">
        <label for="num">Número</label>
        <input type="text" class="form-control forms_label" name="num" id="num">
    </div>
</div>

<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2 text-center">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $num = $_POST["num"];

    if($num != ""){
        if(is_numeric($num)){
            if($num >= 1){
                echo'<div class="row pt-3 pb-3 text-center">';
                for($i=1; $i<=$num; $i++){
                    echo"<h3>$i</h3>";
                }
                echo'<p>--Fim da linha--</p>';
                echo'</div>';
            }
            else{
                // Erro valor inválido
                echo'<div class="row pt-3 pb-3 text-center">';
                echo'<h3 class="error-message">Erro! Insira apenas números maiores que 0!</h3>';
                echo'</div>';
            }
        }else{
            // Erro valor não-numerico
            echo'<div class="row pt-3 pb-3 text-center">';
            echo'<h3 class="error-message">Erro! Insira apenas números!</h3>';
            echo'</div>';
        }
    }else{
        // Erro valor não inserido
        echo'<div class="row pt-3 pb-3 text-center">';
        echo'<h3 class="error-message">Erro! Valor não inserido!</h3>';
        echo'</div>';
    }
}
?>

<?php
include("rodape.php");
?>