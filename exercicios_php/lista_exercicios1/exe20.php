<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 20</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
</head>
  <body>
<!-- Crie um formulário que permita ao usuário inserir uma distância e um tempo. O script PHP
deve calcular a velocidade média (distância / tempo) e exibir o resultado.-->
    <form method="POST">
        <div class="container container-main">
            <div class="row forms_title">
                <h1>Exercício 20</h1>
            </div>

            <div class="row pt-3 justify-content-center">
                <div class="col-md-2">
                    <label for="distancia">Distância</label>
                    <input type="text" class="form-control forms_label" name="distancia" id="distancia">
                </div>
                <div class="col-md-2">
                    <label for="tempo">Tempo</label>
                    <input type="text" class="form-control forms_label" name="tempo" id="tempo">
                </div>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-2 text-center pb-3">
                    <button class="btn btn-success">Calcular!</button>
                </div>
            </div>

            <?php
            // Checa se o campo foi enviado
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $distancia = $_POST["distancia"];
                $tempo = $_POST["tempo"];
                // Checa se o campo está vazio
                if($distancia != "" && $tempo != ""){
                    if(is_numeric($distancia) && is_numeric($tempo)){
                        // Checa se valores são válidos
                        if($distancia > 0 && $tempo > 0){
                            $vel_media = $distancia/$tempo;

                            echo '<div class="row pt-3 pb-3 text-center">';
                            echo "<h3>Velocidade média: $vel_media km/h</h3>";
                            echo '</div>';
                        }else{
                            echo'<div class="row pt-3 pb-3 text-center">';
                            echo'<h3 class="error-message">Insira apenas números positivos maiores que 0.</h3>';
                            echo'</div>';
                        }
                    }
                    else{
                        // erro não-numerico
                        echo'<div class="row pt-3 pb-3 text-center">';
                        echo'<h3 class="error-message">Erro! Insira apenas números!</h3>';
                        echo'</div>';
                    }
                }
                else{
                    //erro vazio
                    echo'<div class="row pt-3 pb-3 text-center">';
                    echo'<h3 class="error-message">Erro! Valor não inserido!</h3>';
                    echo'</div>';
                }
            }
            ?>
        </div><!--Fim do container principal-->
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>