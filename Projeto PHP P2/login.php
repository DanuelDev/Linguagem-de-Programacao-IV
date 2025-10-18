<?php include "cabecalho.php" ?>

<form action="" method="post">

    <div class="container" style="margin-bottom: 100px">
        <div class="container" style="width: 500px;">
    <?php
    if(isset($_GET["cadastro"])){
        $cadastro = $_GET["cadastro"];
        if($cadastro){
            echo"<p class='text-success text-center'><strong>Cadastro realizado com sucesso!</strong></p>";
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require("db\conexao.php");
        $email = $_POST['cliente-email'];
        $senha = $_POST['cliente-senha'];

        try{
            $stmt = $pdo->prepare("SELECT * FROM hospedes WHERE email = ?");
            $stmt->execute([$email]);
            $hospede = $stmt->fetch(PDO::FETCH_ASSOC);
            if($hospede && password_verify($senha, $hospede['senha'])){
                session_start();
                $_SESSION['acesso'] = true;
                $_SESSION['nome'] = $hospede['nome'];
                $_SESSION['email'] = $hospede['email'];
                $_SESSION['telefone'] = $hospede['telefone'];
                header('location: hospedes\index.php');
            } else{
                echo "<p class='text-danger text-center'><strong>Credenciais inválidas!</strong></p>";
            }
        }catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
    ?>
        </div>
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