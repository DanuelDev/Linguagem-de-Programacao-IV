<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
</head>
  <body>
<!--Crie um formulário que permita ao usuário inserir uma base e um expoente. O script PHP deve
calcular a base elevada ao expoente e exibir o resultado.-->
    <form method="POST">
        <div class="container container-main">
            <div class="row forms_title">
                <h1>Exercício 12</h1>
            </div>

            <div class="row pt-3 justify-content-center">
                <div class="col-md-3">
                    <label for="base">Base</label>
                    <input type="text" class="form-control forms_label" name="base" id="base">
                </div>
                <div class="col-md-3">
                    <label for="expoente">Expoente</label>
                    <input type="text" class="form-control forms_label" name="expoente" id="expoente">
                </div>

                <div class="col-md-2 text-center pb-3 mt-4">
                    <button class="btn btn-success">Calcular!</button>
                </div>

            </div>

            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    // Verifica se o campo foi enviado
                    if(isset($_POST["base"]) && isset($_POST["expoente"])){
                        $base = $_POST["base"];
                        $expoente = $_POST["expoente"];

                        if($base !== "" && $expoente !== "" && is_numeric($base) && is_numeric($expoente)){
                            $resul = pow($base, $expoente);

                            echo'<div class="row pt-3 pb-3 text-center">';
                            echo    "<h3>Resultado: $resul</h3>";
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