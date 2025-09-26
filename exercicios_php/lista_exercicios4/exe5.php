<?php include "cabecalho.php" ?>
<!--Crie um formulário que leia dados de 5 livros: título e quantidade em estoque. 
Leia os dados e crie um mapa ordenado onde as chaves são os títulos dos livros e os valores são a quantidade em estoque. 
Verifique se a quantidade em estoque é inferior a 5 e exiba um alerta para os livros com baixa quantidade. 
Exiba a lista ordenada pelo título dos livros.-->

 <div class="row forms_title">
    <h3>Exercício 5</h3>
</div>
<?php for($i = 1; $i <= 5; $i++): ?>
    <div class="row pt-5 justify-content-center">
        <div class="col-md-3">
            <label for="livro[<?= $i ?>][titulo]">Título do Livro</label>
            <input type="text" class="form-control forms_label" name="livro[<?= $i ?>][titulo]" id="ilivrotem[<?= $i ?>][titulo]" required="">
        </div>
        <div class="col-md-1">
            <label for="livro[<?= $i ?>][qntestoque]">Estoque</label>
            <input type="number" class="form-control forms_label" name="livro[<?= $i ?>][qntestoque]" id="livro[<?= $i ?>][qntestoque]" required="">
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
    $dados = $_POST["livro"];
    $livros = [];

    foreach($dados as $livro){
        $titulo = $livro["titulo"];
        $estoque = $livro["qntestoque"];

        $livros[$titulo] = [$titulo, $estoque];
    }

    // Ordena pelo titulo. letras => a,b,c...
    asort($livros);


    echo "<div class='row text-center'>";
    echo    "<h3>Itens/precos:</h3>";
    echo "</div>";
    echo "<div class='row pt-2 justify-content-center'>";
    echo "    <div class='col-md-4'>";
            foreach($livros as $titulo => $dadosLivros){
                $titulo = $dadosLivros[0];
                $estoque = $dadosLivros[1];
                // Se o estoque estiver baixo (menos que 6)
                if($estoque <= 5){
                    echo "<span class ='input-group-text text-danger border border-danger'>Baixo estoque!</span>";
                    echo "<h5 class='form-control border border-danger pt-3 pb-3 p-3'><strong>".$titulo."</strong> <br>".$estoque."</h5>";
                    echo "<div>";
                }else{
                    //Se o estoque for maior que 5
                    echo "<h5 class='form-control border border-dark pt-3 pb-3 p-3'><strong>".$titulo."</strong> <br>".$estoque."</h5>";
                }
            }
    echo "    </div>";
    echo "</div>";

}
?>


<?php include "rodape.php" ?>