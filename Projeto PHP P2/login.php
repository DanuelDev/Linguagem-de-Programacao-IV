<?php include "cabecalho.php" ?>

<form action="" method="post">

    <div class="container" style="margin-bottom: 100px">

        <div class="container container-title" style="width: 500px;">
            <h3 class="text-center forms-title">Login</h3>
        </div>
        <!--=======================================-->
        <div class="container container-login-forms" style="width: 500px;">
            <div class="col-8 pt-3 pb-3 justify-content-center">
                <label for="cliente-email"><strong>E-mail</strong></label>
                <input type="email" class="form-control forms-label-login" name="cliente-email" id="cliente-email" require="">
                <br>
                <label for="cliente-senha"><strong>Senha</strong></label>
                <input type="password" class="form-control forms-label-login" name="cliente-senha" id="cliente-senha" require="">
            </div>
            <div class="col-flex text-center justify-content-center" style="padding-top: 20px; padding-bottom: 30px;">
                <button type="submit" class="btn checkin-button"><strong>Login</strong></button>
            </div>
        </div>
        <br>
        <div class="container" style="width: 500px;">
            <p><a href="registrar.php">Ainda não possui uma conta?</a></p>
        </div>
    </div>
</form>
<br>
<?php include "rodape.php" ?>