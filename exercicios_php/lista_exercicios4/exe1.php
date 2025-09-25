<?php include "cabecalho.php" ?>
<!--Crie um formulário que leia dados de 5 contatos: nome e número de telefone.
 Leia os dados e crie um mapa ordenado onde as chaves são os nomes dos contatos e os valores são os números de telefone. 
 Verifique se há duplicatas de nome ou número de telefone antes de adicionar um novo contato.
 Exiba a lista ordenada pelos nomes dos contatos.-->

 <div class="row forms_title">
    <h3>Exercício 1</h3>
</div>
<?php for($i = 1; $i <= 5; $i++): ?>
    <div class="row pt-2 justify-content-center">
        <div class="col-md-2">
            <label for="nome[]">Nome</label>
            <input type="text" class="form-control forms_label" name="nome[]" id="nome[]" required="">
        </div>
        <div class="col-md-2">
            <label for="tel[]">Telefone</label>
            <input type="text" class="form-control forms_label" name="tel[]" id="tel[]" required="">
        </div>
    </div>
<?php endfor; ?>
<div class="row pt-3 pb-3 justify-content-center">
    <div class="col-md-2 text-center">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $tel = $_POST["tel"];
    # cria o array vazio
    $contatos = [];
    #formata o array "nome => tel"
    $erro = false;
    for($i = 0; $i <= 4; $i++){
        for($j = 0; $j <= 4; $j++){
            if($j != $i && $erro == false){
                if($nome[$i] == $nome[$j]){
                    $erro = true;
                }
                if($tel[$i] == $tel[$j]){
                    $erro = true;
                }
            }
        }
    }
    if($erro){
        echo'<div class="row pt-3 pb-3 text-center">';
        echo'<h3 class="error-message">Erro! Contatos repetidos!</h3>';
        echo'</div>';
    }else{
        for($i = 0; $i <= 4; $i++){
            $contatos[$nome[$i]] = $tel[$i];
        }
    }


echo "<div class='row text-center'>";
    echo    "<h3>Contatos registrados:</h3>";
    echo "</div>";
    echo "<div class='row pt-2 justify-content-center'>";
        echo "<div class='col-md-2'>";
            if($erro != true){
                foreach ($contatos as $n => $c){ 
                    echo "<h5 class='border border-dark pt-3 pb-3 p-3'><strong>$n</strong> - $c</h5>";
                }
            }
        echo "</div>";
    echo "</div>";
echo "</div>";
}
?>
<?php include "rodape.php" ?>