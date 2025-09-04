<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 16</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
</head>
  <body>
<!--Crie um formulário que permita ao usuário inserir um preço e um percentual de desconto. O 
script PHP deve calcular o preço com desconto e exibir o resultado.-->
    <form method="POST">
        <div class="container container-main">
            <div class="row forms_title">
                <h1>Exercício 16</h1>
            </div>

            <div class="row pt-3 justify-content-center">
                <div class="col-md-2">
                    <label for="val_produto">Valor do produto</label>
                    <input type="text" class="form-control forms_label" name="val_produto" id="val_produto">
                </div>
                <div class="col-md-1">
                    <label for="desconto">Desconto</label>
                    <div class="input-group">
                        <input type="text" class="form-control forms_label" name="desconto" id="desconto">
                        <span class="input-group-text">%</span>
                    </div>
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
                $val_produto = $_POST["val_produto"];
                $desconto = $_POST["desconto"];
                // Checa se o campo está vazio
                if($val_produto != "" && $desconto != ""){
                    if(is_numeric($val_produto) && is_numeric($desconto)){
                        // Checa se o valor é passivel de desconto
                        if($desconto > 0){
                            $desconto_aplicado = $val_produto * ($desconto/100);
                            $total = $val_produto - $desconto_aplicado;
                            $total = number_format($total, 2, ",", ".");
                            $desconto_aplicado = number_format($desconto_aplicado, 2, ",", ".");

                            echo '<div class="row pt-3 pb-3 text-center alert alert-success">';
                            echo '<h3>Oba! Desconto aplicado com <strong>SUCESSO!</strong></h3>';
                            echo "<h3>Descontro aplicado: $desconto%</h3>";
                            echo "<h3>Valor economizado: R$$desconto_aplicado </h3>";
                            echo "<h3>Total: R$$total</h3>";
                            echo '</div>';
                        }elseif($desconto == 0){
                            //Erro valor inválido
                            echo'<div class="row pt-3 pb-3 text-center">';
                            echo'<h3>Nenhum desconto aplicado...</h3>';
                            echo'</div>';
                        }
                        else{
                            echo'<div class="row pt-3 pb-3 text-center">';
                            echo'<h3 class="error-message">Aplique um desconto válido</h3>';
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