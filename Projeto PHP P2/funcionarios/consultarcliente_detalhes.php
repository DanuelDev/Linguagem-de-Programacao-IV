<?php
    require("cabecalho.php");
    require("../db/conexao.php");
    // Buscar o cliente pelo ID fornecido na URL
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        try{
            $stmt = $pdo->prepare("SELECT * from hospedes WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $hospede = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo "Erro ao consultar hospede: ".$e->getMessage();
        }
    }
    // Processar o formulário de exclusão
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        try{
            $stmt = $pdo->prepare("DELETE FROM hospedes WHERE id = ?");
            $stmt->execute([$id]);
        }catch(Exception $e){
            echo "erro: ".$e->getMessage();
        }
    }
?>
    <div class="container mb-5" style="margin-top: 100px;">
        <h1 class="no-print">Consultar hospede</h1>
        <form method="post">
            <div class="row mb-3 mt-5">
                <input type="hidden" name="id" value="<?= $hospede['id'] ?>">
                <div class="col-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input disabled value="<?= $hospede['nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email:</label>
                    <input disabled value="<?= $hospede['email']?>" type="text" id="email" name="email" class="form-control" required="">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input disabled value="<?= $hospede['telefone']?>" type="text" id="telefone" name="telefone" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input disabled value="<?= $hospede['cpf']?>" type="text" id="cpf" name="cpf" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="nascimento" class="form-label">Nascimento:</label>
                    <input disabled value="<?= $hospede['data_nascimento']?>" type="text" id="nascimento" name="nascimento" class="form-control" required="">
                </div>
            </div>
            <div class="row mb-3 mb-4" style="border-bottom: 2px SOLID; padding-bottom: 30px">
                <div class="col">
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input disabled value="<?= $hospede['endereco']?>" type="text" id="endereco" name="endereco" class="form-control" required="">
                </div>
            </div>
            <!-- Botões: Excluir, Voltar, Imprimir -->
            <div class="d-flex gap-2 no-print" >
                <button type="submit" class="btn btn-danger no-print">Excluir</button>
                <button onclick="history.back();" type="button" class="btn btn-secondary no-print">Voltar</button>
                <a class="btn btn-secondary no-print" onclick="window.print()">Imprimir</a>
            </div>
        </form>
    </div>

<?php
    require("rodape.php");
?>