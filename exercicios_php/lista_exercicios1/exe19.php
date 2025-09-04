<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
    </head>
    <body>
<!--Crie um formulário que permita ao usuário inserir um valor em dias. O script PHP deve
converter esse valor para horas, minutos e segundos e exibir o resultado-->
    <form method="post">
        <div class="container container-main pb-3">
            <div class="row forms_title">
                <h3>Exercício 19</h3>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-2">
                    <label for="dias">Dias</label>
                    <input type="text" class="form-control forms_label" name="dias" id="dias">
                </div>
                <div class="col-md-2 text-center mt-4">
                    <button class="btn btn-success">Converter!</button>
                </div>
            </div>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Verifica se os campos foram enviados
                if(isset($_POST["dias"])){
                    $dias = $_POST["dias"];

                    // Verifica se os campos não estão vazios
                    if($dias !== "" && is_numeric($dias) && $dias > 0){
                        $horas = $dias * 24;
                        $minutos = $horas * 60;
                        $segundos = $minutos * 60;

                        echo'<div class="row justify-content-center">';
                        echo'<div class="col-md-3 pt-3">';
                        echo    "<h3>Dias: $dias</h3>";
                        echo    "<h3>Horas: $horas</h3>";
                        echo    "<h3>Minutos: $minutos</h3>";
                        echo    "<h3>Segundos: $segundos</h3>";
                        echo'</div>';
                        echo'</div>';
                    }
                    else{ // Erro numeros invalidos
                        echo'<div class="row pt-3 pb-3 text-center error-message">';
                        echo    '<h3 class="error-message">Por favor, informe apenas números positivos maiores que 0!</h3>';
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