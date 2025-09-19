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
            <label for="nome[]">Nome</label>
            <input type="text" class="form-control forms_label" name="nome[]" id="nome[]" required="">
        </div>
        <div class="col-md-2">
            <label for="tel[[]]">Nota 1</label>
            <input type="text" class="form-control forms_label" name="tel[[]]" id="tel[[]]" required="">
        </div>
        <div class="col-md-2">
            <label for="tel[[]]">Nota 2</label>
            <input type="text" class="form-control forms_label" name="tel[[]]" id="tel[[]]" required="">
        </div>
        <div class="col-md-2">
            <label for="tel[[]]">Nota 3</label>
            <input type="text" class="form-control forms_label" name="teltel[[]]" id="teltel[[]]" required="">
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
    $nota = $_POST["nota"];
    # cria o array vazio
    $alunos = [];

    function med($arg){
        for($i = 0; $i <= 5; $i++){
            
        }
    }
}
?>

<div class="row pt-2 justify-content-center">
    <div class="row text-center">
        <h3>Contatos registrados:</h3>
    </div>
    <div class="row pt-2 justify-content-center">
        <div class="col-md-2">
            <?php 

            ?>
        </div>
    </div>
</div>

<?php include "rodape.php" ?>