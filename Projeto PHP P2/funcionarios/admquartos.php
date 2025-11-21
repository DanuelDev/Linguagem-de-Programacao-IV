<?php
// Processar o formulário de registro de quarto
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require("..\db\conexao.php");
        $numero = $_POST["numero"];
        $tipo = $_POST["apartamento"];
        $capacidade = $_POST["capacidade"];
        $preco_diaria = $_POST["precodiaria"];
        $descricao = $_POST["mensagem"];
        $status = $_POST["status"];

        try{
            // Inserir o novo quarto no banco de dados
        $stmt = $pdo->prepare("INSERT INTO quartos (numero, tipo, capacidade, preco_diaria, descricao, status) VALUES (?, ?, ?, ?, ?, ?)");
        if($stmt->execute([$numero, $tipo, $capacidade, $preco_diaria, $descricao, $status])){
            header("location: consultarquartos.php");
        }
        }catch(Exception $e){
            echo "Erro ao executar o comando SQL: ".$e->getMessage();
        }
    }
?>

<?php include "cabecalho.php" ?>

<form action="" method="post">

    <div class="container-flex" style="margin-bottom: 100px; border-color: #212529;">

        <div class="container container-title" style="width: 700px; background-color: #212529; border-color: #212529;">
            <!-- formulário de registro de quarto -->
            <h3 class="text-center forms-title">Registrar Quarto</h3>
        </div>
        <!--=======================================-->
        <div class="container container-login-forms" style="border-color: #212529;">
            <br>
            <div class="row justify-content-center">
                <div class="col-2 pt-3 pb-3">
                    <label for="numero"><strong>Nº Quarto</strong></label>
                    <input type="text" class="form-control forms-label-login" name="numero" id="numero" required>
                </div>
                <div class="col-2 pt-3 pb-3">
                    <label for="capacidade"><strong>Capacidade</strong></label>
                    <input type="text" class="form-control forms-label-login" name="capacidade" id="capacidade" required>
                </div>
                <div class="col-3 pt-3 pb-3">
                    <label for="precodiaria"><strong>Preço da Diária</strong></label>
                    <input type="text" class="form-control forms-label-login" name="precodiaria" id="precodiaria" required>
                </div>
            </div>
            <br>
            <div class="row pt-2 justify-content-center">
                <div class="col-7">
                    <label for="apartamento"><strong>Apartamento</strong></label>
                    <select class="form-select forms-label" name="apartamento" id="apartamento" require="">
                        <option selected>---</option>
                        <option value="suite">Suíte</option>
                        <option value="luxotriplo">Luxo Triplo</option>
                        <option value="luxoduplo">Luxo Duplo</option>
                        <option value="luxocasal">Luxo Casal</optioI>
                        <option value="suiteconjugada">Suíte Conjugada</option>
                        <option value="apartamentomini">Apartamento Mini</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="status"><strong>Status</strong></label>
                    <select class="form-select forms-label" name="status" id="status" require="">
                        <option selected></option>
                        <option value="disponivel">Disponível</option>
                        <option value="indisponivel">Indisponivel</option>
                        <option value="manutencao">Manutenção</option>
                    </select>
                </div>
            </div>
            <div class="row pt-2 justify-content-center">
                <div class="col-md-12 pb-3">
                    <label for="mensagem"><strong>Mensagem</strong> <i class="text-muted">*opcional</i></label>
                    <textarea class="form-control forms-label" id="mensagem" name="mensagem" rows="4"></textarea>
                </div>
            </div>
            <!--=======================================-->
            <div class="col-flex text-center justify-content-center" style="padding-top: 20px; padding-bottom: 30px;">
                <button type="submit" class="btn checkin-button"><strong>Registrar</strong></button>
            </div>
        </div>
        <br>
    </div>
</form>
<br>

<?php include "rodape.php" ?>
