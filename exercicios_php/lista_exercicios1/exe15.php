<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
</head>
  <body>
<!--Crie um formulário que permita ao usuário inserir seu peso (em kg) e altura (em metros). O
script PHP deve calcular o IMC (peso / altura²) e exibir o resultado.-->
    <form method="POST">
        <div class="container container-main">
            <div class="row forms_title">
                <h1>Exercício 15</h1>
            </div>

            <div class="row pt-3 justify-content-center">
                <div class="col-md-3">
                    <label for="peso">Peso</label>
                    <input type="text" class="form-control forms_label" name="peso" id="peso">
                </div>
                <div class="col-md-3">
                    <label for="altura">Altura</label>
                    <input type="text" class="form-control forms_label" name="altura" id="altura">
                </div>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-2 text-center pb-3">
                    <button class="btn btn-success">Calcular!</button>
                </div>
            </div>

            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    // Verifica se o campo foi enviado
                    if(isset($_POST["peso"]) && isset($_POST["altura"])){
                        $peso = $_POST["peso"];
                        $altura = $_POST["altura"];

                        if($peso !== "" && $altura !== "" && is_numeric($peso) && is_numeric($altura)){
                            $imc = $peso / (pow($altura, 2));
                            $imc = number_format($imc, 2, ",", ".");

                            echo'<div class="row pt-3 pb-3 text-center">';
                            echo    "<h3>IMC: $imc</h3>";
                            echo'</div>';
                        }
                        else{
                            echo'<div class="row pt-3 pb-3 text-center error-message">';
                            echo    '<h3 class="error-message">Por favor, informe números válidos!</h3>';
                            echo'</div>';
                        }
                    }
                }
            ?>
        </div><!--Fim do container principal-->
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>