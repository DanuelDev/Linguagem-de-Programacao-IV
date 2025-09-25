<?php include "cabecalho.php" ?>
<!--Crie um formulário que leia dados de 5 alunos: nome e três notas. 
Leia os dados e crie um mapa ordenado onde as chaves são os nomes dos alunos e os valores são as médias das notas. 
Exiba a lista de alunos ordenada pela média das notas (do maior para o menor).-->

 <div class="row forms_title">
    <h3>Exercício 2</h3>
</div>
<?php for($i = 1; $i <= 5; $i++): ?>
    <div class="row pt-2 justify-content-center">
        <div class="col-md-2">
            <label for="alunos[<?= $i ?>][nome]">Nome</label>
            <input type="text" class="form-control forms_label" name="alunos[<?= $i ?>][nome]" id="alunos[<?= $i ?>][nome]" required="">
        </div>
        <div class="col-md-2">
            <label for="alunos[<?= $i ?>][notas][]">Nota 1</label>
            <input type="number" class="form-control forms_label" name="alunos[<?= $i ?>][notas][]" id="alunos[<?= $i ?>][notas][]" required="">
        </div>
        <div class="col-md-2">
            <label for="alunos[<?= $i ?>][notas][]">Nota 2</label>
            <input type="number" class="form-control forms_label" name="alunos[<?= $i ?>][notas][]" id="alunos[<?= $i ?>][notas][]" required="">
        </div>
        <div class="col-md-2">
            <label for="alunos[<?= $i ?>][notas][]">Nota 3</label>
            <input type="number" class="form-control forms_label" name="alunos[<?= $i ?>][notas][]" id="alunos[<?= $i ?>][notas][]" required="">
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
    $dados = $_POST["alunos"];
    $alunos = [];

    foreach($dados as $aluno){
        $nome = $aluno["nome"];
        $notas = $aluno["notas"];
        $media = array_sum($notas) / 3;
        $alunos[$nome] = $media;
    }

    # Ordena maior para o menor
    arsort($alunos);

    echo "<div class='row pt-2 justify-content-center'>";
    echo "<div class='row text-center'>";
    echo    "<h3>Alunos/médias:</h3>";
    echo "</div>";
    echo "<div class='row pt-2 justify-content-center'>";
    echo "    <div class='col-md-2'>";
            foreach($alunos as $nome => $media){
                echo "<h5 class='border border-dark pt-3 pb-3 p-3'><strong>$nome</strong> <br> Média: ".number_format($media, 1, ",")."</h5>";
            }
    echo "    </div>";
    echo "</div>";
echo "</div>";
}
?>


<?php include "rodape.php" ?>