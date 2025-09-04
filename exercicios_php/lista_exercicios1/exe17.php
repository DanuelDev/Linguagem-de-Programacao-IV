<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 17</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
    </head>
    <body>
<!--Crie um formulário que permita ao usuário inserir um capital, uma taxa de juros e um período.
O script PHP deve calcular os juros simples (capital * taxa * período) e exibir o resultado.-->
    <form method="post">
        <div class="container container-main">
            <div class="row forms_title">
                <h3>Exercício 17</h3>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-2">
                    <label for="capital">Capital</label>
                    <input type="text" class="form-control forms_label" name="capital" id="capital">
                </div>
                <div class="col-md-2">
                    <label for="taxa_juros">Taxa de juros</label>
                    <input type="text" class="form-control forms_label" name="taxa_juros" id="taxa_juros">
                </div>
                <div class="col-md-2">
                    <label for="periodo">Período</label>
                    <input type="text" class="form-control forms_label" name="periodo" id="periodo">
                </div>
            </div>
            <div class="row pt-3 pb-3 justify-content-center">
                <div class="col-md-3 text-center">
                    <button type="submit" class="btn btn-success">Calcular!</button>
                </div>
            </div>

            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Verifica se os campos foram enviados
                if(isset($_POST["capital"]) && isset($_POST["taxa_juros"]) && isset($_POST["periodo"])){
                    $capital = $_POST["capital"];
                    $taxa_juros = $_POST["taxa_juros"];
                    $periodo = $_POST["periodo"];

                    //Verifica se os campos estão vazios
                    if($capital !== "" && $taxa_juros !== "" && $periodo !== ""){
                        //Verifica se são números válidos
                        if(is_numeric($capital) && is_numeric($taxa_juros) && is_numeric($periodo)){
                            $juros_simples = (float)$capital * (float)$taxa_juros * (float)$periodo;
                            $juros_simples = number_format($juros_simples, 2, ",", ".");

                            echo'<div class="row pt-3 pb-3 text-center">';
                            echo    "<h3>Juros simples: $juros_simples</h3>";
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