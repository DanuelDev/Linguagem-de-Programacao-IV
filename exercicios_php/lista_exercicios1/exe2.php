<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
    </head>
    <body>
<!--Crie um formulário que permita ao usuário inserir dois números. O script PHP deve subtrair o segundo número do primeiro e exibir o resultado.-->
    <form method="post">
        <div class="container container-main">
            <div class="row forms_title">
                <h3>Exercício 2</h3>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-3">
                    <label for="num1">Primeiro número</label>
                    <input type="text" class="form-control forms_label" name="num1" id="num1">
                </div>
                <div class="col-auto mt-4">
                    <h4>-</h4>
                </div>
                <div class="col-md-3">
                    <label for="num2">Segundo número</label>
                    <input type="text" class="form-control forms_label" name="num2" id="num2">
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
                if(isset($_POST["num1"]) && isset($_POST["num2"])){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];

                    //Verifica se os campos estão vazios
                    if($num1 !== "" && $num2 !== ""){
                        //Verifica se são números válidos
                        if(is_numeric($num1) && is_numeric($num2)){
                            $sub = (float)$num1 - (float)$num2;
                            echo'<div class="row pt-3 pb-3 text-center">';
                            echo    "<h3>Resultado: $sub</h3>";
                            echo'</div>';
                        }
                        else{
                            echo'<div class="row pt-3 pb-3 text-center error-message">';
                            echo    '<h3 class="error-message">Por favor, informe números válidos!</h3>';
                            echo'</div>';
                        }
                    }
                    else{
                            echo'<div class="row pt-3 pb-3 text-center">';
                            echo    '<h3 class="error-message">Por favor, informe os dois números!</h3>';
                            echo'</div>';
                    }
                }
            }
            ?>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>