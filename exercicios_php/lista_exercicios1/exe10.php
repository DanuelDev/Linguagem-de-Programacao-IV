<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
    </head>
    <body>
        <!--Crie um formulário que permita ao usuário inserir a largura e a altura de um retângulo. O script
PHP deve calcular o perímetro do retângulo e exibir o resultado.-->
    <form method="post">
        <div class="container container-main">
            <div class="row forms_title">
                <h3>Exercício 10</h3>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-3">
                    <label for="largura">Base</label>
                    <input type="text" class="form-control forms_label" name="largura" id="largura">
                </div>
                <div class="col-md-3">
                    <label for="altura">Altura</label>
                    <input type="text" class="form-control forms_label" name="altura" id="altura">
                </div>
            </div>
            
            <div class="row pt-3 pb-3 justify-content-center">
                <div class="col-md-2 text-center">
                    <button class="btn btn-success">Calcular!</button>
                </div>
            </div>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Verifica se os campos foram enviados
        if(isset($_POST['largura']) && isset($_POST['altura'])){
            $largura = $_POST["largura"];
            $altura = $_POST["altura"];
            
            // Verifica se os campos não estão vazios
            if($largura !== "" && $altura !== ""){
                // Verifica se são números válidos
                if(is_numeric($largura) && is_numeric($altura)){
                    $perimetro = 2*((float)$largura + (float)$altura);
                    echo'<div class="row pt-3 pb-3 text-center">';
                    echo    "<h3>Perímetro: $perimetro</h3>";
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