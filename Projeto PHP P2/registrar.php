<?php include "cabecalho.php" ?>

<form action="" method="post">

    <div class="container-flex" style="margin-bottom: 100px">

        <div class="container container-title" style="width: 700px;">
            <h3 class="text-center forms-title">Registrar</h3>
        </div>
        <!--=======================================-->
        <div class="container container-login-forms">
            <div class="row justify-content-center">
                <div class="col-7 pt-3 pb-3">
                    <label for="cliente-email"><strong>E-mail</strong></label>
                    <input type="email" class="form-control forms-label-login" name="cliente-email" id="cliente-email" require="">
                </div>
                <div class="col-5 pt-3 pb-3">
                    <label for="cliente-nome"><strong>Nome completo</strong></label>
                    <input type="text" class="form-control forms-label-login" name="cliente-nome" id="cliente-nome" require="">
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-7 pt-3 pb-3">
                    <label for="cliente-senha"><strong>Senha</strong></label>
                    <input type="password" class="form-control forms-label-login" name="cliente-senha" id="cliente-senha" require="">
                </div>
                <div class="col-5 pt-3 pb-3">
                    <label for="cliente-CPF"><strong>CPF</strong><i class="text-muted"> *apenas números</i></label>
                    <input type="text" class="form-control forms-label-login" name="cliente-CPF" id="cliente-CPF" placeholder="123456" require="">
                </div>
            </div>
                <div class="col-5 pt-3 pb-3">
                    <label for="cliente-confirmarsenha"><strong>Confirmar Senha</strong></label>
                    <input type="password" class="form-control forms-label-login" name="cliente-confirmarsenha" id="cliente-confirmarsenha" require="">
                </div>
            <div class="row text-center">
                <p>A senha deve conter:</p>
                <div class="col-6">
                    <p>✓ Pelo menos 8 caracteres</p>
                    <p>✓ Pelo menos 1 letra</p>
                </div>
                <div class="col-6">
                    <p>✓ Pelo menos 1 número</p>
                    <p>✓ Pelo menos 1 símbolo</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 pt-3 pb-3">
                    <label for="cliente-nascimento"><strong>Nascimento</strong></label>
                    <input type="date" class="form-control forms-label-login" name="cliente-nascimento" id="cliente-nascimento" require="">
                </div>
                <div class="col-6 pt-3 pb-3">
                    <label for="cliente-telefone"><strong>Telefone</strong></label>
                    <input type="text" class="form-control forms-label-login" name="cliente-telefone" id="cliente-confirmarstelefoneenha" placeholder="123456" require="">
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