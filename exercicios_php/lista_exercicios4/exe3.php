<?php include "cabecalho.php" ?>
<!--Crie um formulário que leia dados de 5 produtos, que são: código, nome e preço. 
Leia os dados e crie um mapa ordenado onde as chaves são os códigos dos produtos e os valores são também mapas ordenados com o nome e o preço dos produtos. 
Aplique um desconto de 10% em todos os produtos com preço acima de R$100,00 e exiba a lista ordenada pelo nome do produto.-->

 <div class="row forms_title">
    <h3>Exercício 3</h3>
</div>
<?php for($i = 1; $i <= 5; $i++): ?>
    <div class="row pt-2 justify-content-center">
        <div class="col-md-2">
            <label for="produto[<?= $i ?>][codigoproduto]">Cód. Produto</label>
            <input type="text" class="form-control forms_label" name="produto[<?= $i ?>][codigoproduto]" id="produto[<?= $i ?>][codigoproduto]" required="">
        </div>
        <div class="col-md-2">
            <label for="produto[<?= $i ?>][nomeproduto]">Nome do Produto</label>
            <input type="text" class="form-control forms_label" name="produto[<?= $i ?>][nomeproduto]" id="produto[<?= $i ?>][nomeproduto]" required="">
        </div>
        <div class="col-md-2">
            <label for="produto[<?= $i ?>][precoproduto]">Preço do Produto</label>
            <input type="number" class="form-control forms_label" name="produto[<?= $i ?>][precoproduto]" id="produto[<?= $i ?>][precoproduto]" required="">
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
    $dados = $_POST["produto"];
    $produtos = [];

    foreach($dados as $produto){
        $codigo = $produto["codigoproduto"];
        $nome = $produto["nomeproduto"];
        $preco = $produto["precoproduto"];

        if ($preco >= 100){
            $desconto = $preco * 0.10;
            $preco = $preco - $desconto;
        }

        $produtos[$codigo] = [$nome, $preco];
    }

    // Ordena pelo nome; ordem decrescente
    arsort($produtos);


    echo "<div class='row text-center'>";
    echo    "<h3>Produtos/precos:</h3>";
    echo "</div>";
    echo "<div class='row pt-2 justify-content-center'>";
    echo "    <div class='col-md-2'>";
            foreach($produtos as $codigo => $dadosProduto){
                $nome = $dadosProduto[0];
                $preco = $dadosProduto[1];
                echo "<h5 class='border border-dark pt-3 pb-3 p-3'><strong>".$nome."</strong> <br> R$".(number_format($preco, 2))."</h5>";
            }
    echo "    </div>";
    echo "</div>";

}
?>


<?php include "rodape.php" ?>