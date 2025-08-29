<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
    </head>
    <body>
<!--Crie um formulário que permita ao usuário inserir o raio de um círculo. O script PHP deve
calcular a área do círculo (πr²) e exibir o resultado-->
    <form method="post">
        <div class="container container-main pb-3">
            <div class="row forms_title">
                <h3>Exercício 9</h3>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-2">
                    <label for="raio">Raio</label>
                    <input type="number" class="form-control forms_label" name="raio" id="raio">
                </div>
                <div class="col-md-2 text-center mt-4">
                    <button class="btn btn-success">Calcular!</button>
                </div>
            </div>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Verifica se os campos foram enviados
                if(isset($_POST["raio"])){
                    $raio = $_POST["raio"];

                    // Verifica se os campos não estão vazios
                    if($raio !== ""){
                        $area = (3.14 * ($raio*$raio));
                        echo "$area";
                    }
                    else{
                        echo "tá vazio";
                    }
                }
            }
            ?>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>