<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require("db\conexao.php");
        $email = $_POST["cliente-email"];
        $nome = $_POST["cliente-nome"];
        $senha = $_POST["cliente-senha"];
        $cpf = $_POST["cliente-CPF"];
        $confirmasenha = $_POST["cliente-confirmarsenha"];
        $nascimento = $_POST["cliente-nascimento"];
        $telefone = $_POST["cliente-telefone"];
        $estado = $_POST["cliente-estado"];
        $cidade = $_POST["cliente-cidade"];
        $rua = $_POST["cliente-rua"];
        $cep = $_POST["cliente-cep"];

        if($senha !== $confirmasenha){
            echo "<p>Senhas diferentes!</p>";
        }
        else{
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

            $endereco = $rua . ", " . $cidade . " - " . $estado . ", CEP: " . $cep;

            try{
            $stmt = $pdo->prepare("INSERT INTO hospedes (nome, email, telefone, cpf, data_nascimento, endereco, senha) VALUES (?, ?, ?, ?, ?, ?, ?)");
            if($stmt->execute([$nome, $email, $telefone, $cpf, $nascimento, $endereco, $senhaHash])){
                header("location: login.php?cadastro=true");
            }
            }catch(Exception $e){
                echo "Erro ao executar o comando SQL: ".$e->getMessage();
            }
        }
    }
?>

<?php include "cabecalho.php" ?>

<form action="" method="post">

    <div class="container-flex" style="margin-bottom: 100px">

        <div class="container container-title" style="width: 700px;">
            <h3 class="text-center forms-title">Registrar</h3>
        </div>
        <!--=======================================-->
        <div class="container container-login-forms">
            <div class="col-12 text-center">
                <h5><strong>Dados Pessoais</strong></h5>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-6 pt-3 pb-3">
                    <label for="cliente-email"><strong>E-mail</strong></label>
                    <input type="email" class="form-control forms-label-login" name="cliente-email" id="cliente-email" required>
                </div>
                <div class="col-6 pt-3 pb-3">
                    <label for="cliente-nome"><strong>Nome completo</strong></label>
                    <input type="text" class="form-control forms-label-login" name="cliente-nome" id="cliente-nome" required>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-7 pt-3 pb-3">
                    <label for="cliente-senha"><strong>Senha</strong></label>
                    <input type="password" class="form-control forms-label-login" name="cliente-senha" id="cliente-senha" required>
                </div>
                <div class="col-5 pt-3 pb-3">
                    <label for="cliente-CPF"><strong>CPF</strong><i class="text-muted"> *apenas números</i></label>
                    <input type="text" class="form-control forms-label-login" name="cliente-CPF" id="cliente-CPF" placeholder="123456" required>
                </div>
            </div>
                <div class="col-5 pt-3 pb-3">
                    <label for="cliente-confirmarsenha"><strong>Confirmar Senha</strong></label>
                    <input type="password" class="form-control forms-label-login" name="cliente-confirmarsenha" id="cliente-confirmarsenha" required>
                </div>
            <div class="row text-center">
                <p>A senha deve conter:</p>
                <div class="col-6">
                    <p><span style="color: green;"><strong>✓</strong></span> Pelo menos 8 caracteres</p>
                    <p><span style="color: green;"><strong>✓</strong></span> Pelo menos 1 letra</p>
                </div>
                <div class="col-6">
                    <p><span style="color: green;"><strong>✓</strong></span> Pelo menos 1 número</p>
                    <p><span style="color: green;"><strong>✓</strong></span> Pelo menos 1 símbolo</p>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-6 pt-3 pb-3">
                    <label for="cliente-nascimento"><strong>Nascimento</strong></label>
                    <input type="date" class="form-control forms-label-login" name="cliente-nascimento" id="cliente-nascimento" required>
                </div>
                <div class="col-6 pt-3 pb-3">
                    <label for="cliente-telefone"><strong>Telefone</strong></label>
                    <input type="text" class="form-control forms-label-login" name="cliente-telefone" id="cliente-confirmarstelefoneenha" placeholder="123456" required>
                </div>
            </div>
            <!--=======================================-->
            <div class="col-12 text-center" style="border-top: 2px solid #8b0b0b;">
                <br>
                <h5><strong>Endereço</strong></h5>
            </div>
            <div class="row justify-content-center">
                <div class="col-4 pt-3 pb-3">
                    <label for="cliente-estado"><strong>Estado</strong></label>
                    <select class="form-select forms-label-login" name="cliente-estado" id="cliente-estado" required>
                        <option selected>---</option>
                        <option value="Acre">AC</option>
                        <option value="Alagoas">AL</option>
                        <option value="Amapá">AP</option>
                        <option value="Amazonas">AM</option>
                        <option value="Bahia">BA</option>
                        <option value="Ceará">CE</option>
                        <option value="Espírito Santo">ES</option>
                        <option value="Goiás">GO</option>
                        <option value="Maranhão">MA</option>
                        <option value="Mato Grosso">MT</option>
                        <option value="Mato Grosso do Sul">MS</option>
                        <option value="Minas Gerais">MG</option>
                        <option value="Pará">PA</option>
                        <option value="Paraíba">PB</option>
                        <option value="Paraná">PR</option>
                        <option value="Pernambuco">PE</option>
                        <option value="Piauí">PI</option>
                        <option value="Rio de Janeiro">RJ</option>
                        <option value="Rio Grande do Norte">RN</option>
                        <option value="Rio Grande do Sul">RS</option>
                        <option value="Rondônia">RO</option>
                        <option value="Roraima">RR</option>
                        <option value="Santa Catarina">SC</option>
                        <option value="São Paulo">SP</option>
                        <option value="Sergipe">SE</option>
                        <option value="Tocantins">TO</option>
                    </select>
                </div>
                <div class="col-8 pt-3 pb-3">
                    <label for="cliente-cidade"><strong>Cidade</strong></label>
                    <input type="text" class="form-control forms-label-login" name="cliente-cidade" id="cliente-cidade" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8 pt-3 pb-3">
                    <label for="cliente-rua"><strong>Rua</strong></label>
                    <input type="text" class="form-control forms-label-login" name="cliente-rua" id="cliente-rua" required>
                </div>
                <div class="col-4 pt-3 pb-3">
                    <label for="cliente-cep"><strong>CEP</strong></label>
                    <input type="text" class="form-control forms-label-login" name="cliente-cep" id="cliente-cep" required>
                </div>
            </div>
            <!--=======================================-->
            <div class="col-flex text-center justify-content-center" style="padding-top: 20px; padding-bottom: 30px;">
                <button type="submit" class="btn checkin-button"><strong>Registrar</strong></button>
            </div>
        </div>
        <br>
        <div class="container" style="width: 700px;">
            <p><a href="login.php">Já possui uma conta?</a></p>
        </div>
    </div>
</form>
<br>

<?php include "rodape.php" ?>
