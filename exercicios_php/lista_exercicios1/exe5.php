<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
    </head>
    <body>
<!-- Crie um formulário que permita ao usuário inserir três notas. O script PHP deve calcular a média das notas e exibir o resultado.-->
    <form method="post">
        <div class="container container-main">
            <div class="row forms_title">
                <h3>Exercício 5</h3>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-3">
                    <label for="p1">Nota P1</label>
                    <input type="text" class="form-control forms_label" name="p1" id="p1">
                </div>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-3">
                    <label for="p2">Nota P2</label>
                    <input type="text" class="form-control forms_label" name="p2" id="p2">
                </div>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-3">
                    <label for="p3">Nota P3</label>
                    <input type="text" class="form-control forms_label" name="p3" id="p3">
                </div>
            </div>
            <div class="row pt-3 pb-3 justify-content-center">
                <div class="col-md-3 text-center">
                    <button class="btn btn-success">Calcular!</button>
                </div>
            </div>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Verifica se os campos foram enviados
                if(isset($_POST["p1"]) && isset($_POST["p2"]) && isset($_POST["p3"])){
                    $p1 = $_POST["p1"];
                    $p2 = $_POST["p2"];
                    $p3 = $_POST["p3"];

                    //Verifica se os campos estão vazios
                    if($p1 !== "" && $p2 !== "" && $p3 !== ""){
                        //Verifica se são números válidos
                        if(is_numeric($p1) && is_numeric($p2) && is_numeric($p3)){
                            $med = ((float)$p1 + (float)$p2 + (float)$p3) / 3;
                            echo'<div class="row pt-3 pb-3 text-center">';
                            echo    "<h3>Média: $med</h3>";
                            echo'</div>';
                        }
                        else{
                            echo'<div class="row error-message">';
                            echo    '<h3 class="error-message">Por favor, informe notas válidas!</h3>';
                            echo'</div>';
                        }
                    }
                    else{
                            echo'<div class="row error-message">';
                            echo    '<h3 class="error-message">Por favor, informe as três notas!</h3>';
                            echo'</div>';
                    }
                }
            }
            ?>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>