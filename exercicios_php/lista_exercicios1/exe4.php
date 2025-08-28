<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="forms_style.css" rel="stylesheet">
    </head>
    <body>
    <!--Crie um formulário que permita ao usuário inserir dois números. O script PHP deve dividir o 
    primeiro número pelo segundo e exibir o resultado. Inclua uma verificação para evitar divisão 
    por zero.-->
    <form method="post">
        <div class="container container-main">
            <div class="row forms_title">
                <h3>Exercício 4</h3>
            </div>
            <div class="row pt-3 justify-content-center">
                <div class="col-md-3">
                    <label for="num1">Primeiro número</label>
                    <input type="text" class="form-control forms_label" name="num1" id="num1">
                </div>
                <div class="col-auto mt-4">
                    <h4>÷</h4>
                </div>
                <div class="col-md-3">
                    <label for="num2">Segundo número</label>
                    <input type="text" class="form-control forms_label" name="num2" id="num2">
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
                if(isset($_POST["num1"]) && isset($_POST["num2"])){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];

                    //Verifica se os campos estão vazios
                    if($num1 !== "" && $num2 !== ""){
                        //Verifica se são números válidos
                        if(is_numeric($num1) && is_numeric($num2)){
                            //Verifica se não há uma divisão por zero
                            if($num2 !== "0"){
                                $div = (float)$num1 / (float)$num2;
                                echo'<div class="row pt-3 pb-3 text-center">';
                                echo    "<h3>Resultado: $div</h3>";
                                echo'</div>';
                            }
                            else{
                                echo'<div class="row pt-3 pb-3 text-center error-message">';
                                echo    '<h3 class="error-message">Impossível dividir por 0!</h3>';
                                echo'</div>';
                            }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>