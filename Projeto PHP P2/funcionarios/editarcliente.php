<?php
    require("cabecalho.php");
    require("..\db\conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        try{
            $stmt = $pdo->prepare("SELECT * from hospedes WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $hospede = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo "Erro ao consultar cliente: ".$e->getMessage();
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $nascimento = $_POST['nascimento'];
        $endereco = $_POST['endereco'];
        $id = $_POST['id'];
        try{
            $stmt = $pdo->prepare("UPDATE hospedes set nome = ?, email = ?, telefone = ?, cpf = ?, data_nascimento = ?, endereco = ? WHERE id = ?");
            if($stmt->execute([$nome, $email, $telefone, $cpf, $nascimento, $endereco, $id])){
                header("location: consultarcliente_detalhes.php?id=$id");
            } else {
                header('location: consultarcliente.php');
            }
        }catch(\Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>
    <div class="container" style="margin-top: 100px;">
        <h1>Editar Cliente</h1>
        <form method="post">
        <div class="row mb-3 mt-5">
                <input type="hidden" name="id" value="<?= $hospede['id'] ?>">
                <div class="col-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input value="<?= $hospede['nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email:</label>
                    <input value="<?= $hospede['email']?>" type="text" id="email" name="email" class="form-control" required="">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input value="<?= $hospede['telefone']?>" type="text" id="telefone" name="telefone" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input value="<?= $hospede['cpf']?>" type="text" id="cpf" name="cpf" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="nascimento" class="form-label">Nascimento:</label>
                    <input value="<?= $hospede['data_nascimento']?>" type="text" id="nascimento" name="nascimento" class="form-control" required="">
                </div>
            </div>
            <div class="row mb-3 mb-4" style="border-bottom: 2px SOLID; padding-bottom: 30px">
                <div class="col">
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input value="<?= $hospede['endereco']?>" type="text" id="endereco" name="endereco" class="form-control" required="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

<?php
    require("rodape.php");
?>