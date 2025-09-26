<?php include "cabecalho.php" ?>
<!--Crie um formulário que leia dados de 5 itens: nome e preço. 
Leia os dados e crie um mapa ordenado onde as chaves são os nomes dos itens e os valores são os preços após aplicação de um imposto de 15%. 
Exiba a lista ordenada pelos preços após a aplicação do imposto.-->

 <div class="row forms_title">
    <h3>Exercício 4</h3>
</div>
<?php for($i = 1; $i <= 5; $i++): ?>
    <div class="row pt-2 justify-content-center">
        <div class="col-md-2">
            <label for="item[<?= $i ?>][nomeitem]">Nome do Item</label>
            <input type="text" class="form-control forms_label" name="item[<?= $i ?>][nomeitem]" id="item[<?= $i ?>][nomeitem]" required="">
        </div>
        <div class="col-md-2">
            <label for="item[<?= $i ?>][precoitem]">Preço do Item</label>
            <input type="number" class="form-control forms_label" name="item[<?= $i ?>][precoitem]" id="item[<?= $i ?>][precoitem]" required="">
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
    $dados = $_POST["item"];
    $itens = [];

    foreach($dados as $item){
        $nome = $item["nomeitem"];
        $preco = $item["precoitem"];

        if ($preco >= 100){
            $imposto = $preco * 0.15;
            $preco = $preco + $imposto;
        }

        $itens[$nome] = $preco;
    }

    // Ordena pelo valor
    arsort($itens);


    echo "<div class='row text-center'>";
    echo    "<h3>Itens/precos:</h3>";
    echo "</div>";
    echo "<div class='row pt-2 justify-content-center'>";
    echo "    <div class='col-md-2'>";
            foreach($itens as $nome => $preco){
                echo "<h5 class='border border-dark pt-3 pb-3 p-3'><strong>".$nome."</strong> <br> R$".(number_format($preco, 2))."</h5>";
            }
    echo "    </div>";
    echo "</div>";

}
?>


<?php include "rodape.php" ?>