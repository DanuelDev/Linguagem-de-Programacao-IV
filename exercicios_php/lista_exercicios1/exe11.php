<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
    </head>
    <body>
<!--Crie um formulário que permita ao usuário inserir o raio de um círculo. O script PHP deve
calcular o perímetro do círculo (2πr) e exibir o resultado.-->
    <form method="post">
        <div class="container container-main">
            <div class="row forms_title">
                <h1>Exercício 11</h1>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-2">
                    <label for="raio">Raio</label>
                    <input type="text" class="form-control forms_label" name="raio" id="raio">
                </div>
                <div class="col-md-2 text-center pb-3 mt-4">
                    <button class="btn btn-success">Calcular!</button>
                </div>
            </div>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Verifica se o campo foi enviado e se o campo está fazio
                if(isset($_POST["raio"]) && $_POST["raio"] !== ""){
                    $raio = $_POST["raio"];

                    // Verifica se foi inserido um numero
                    if(is_numeric($raio) && $raio > 0){
                        $raio = (float)$raio;
                        $perimetro = ((2*3.14)*$raio);

                        echo'<div class="row pt-3 pb-3 text-center">';
                        echo    "<h3>Perímetro: $perimetro</h3>";
                        echo'</div>';
                    }
                    else{
                        echo'<div class="row pt-3 pb-3 text-center error-message">';
                        echo    '<h3 class="error-message">Por favor, informe um número válido maior que zero!</h3>';
                        echo'</div>';
                    }
                }else{
                        echo'<div class="row pt-3 pb-3 text-center">';
                        echo    '<h3 class="error-message">Por favor, informe o número!</h3>';
                        echo'</div>';
                    }
            }
            ?>
        </div><!--Fim do container-->
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>