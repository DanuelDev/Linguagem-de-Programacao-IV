<?php
    require("cabecalho.php");
    require("../db/conexao.php");
    // Buscar o quarto pelo ID fornecido na URL
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        try{
            // Buscar o quarto pelo ID fornecido na URL
            $stmt = $pdo->prepare("SELECT * from quartos WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $quarto = $stmt->fetch(PDO::FETCH_ASSOC);

            // Buscar o nome do hóspede associado ao quarto, se houver
            $sql = "SELECT nome FROM hospedes WHERE id = :hospede_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':hospede_id', $quarto['hospede_id']);
                $stmt->execute();
                $hospede = $stmt->fetch(PDO::FETCH_ASSOC);
            if($hospede){
                $nome = $hospede['nome'];
            }else{
                // Se não houver hóspede associado, definir nome como vazio
                $nome = '';
            }
        } catch (Exception $e){
            echo "Erro ao consultar reserva: ".$e->getMessage();
        }
    }
?>
    <div class="container mb-5" style="margin-top: 100px;">
        <h1 class="no-print">Consultar reserva</h1>
        <form method="post">
            <div class="row mb-3 mt-5">
                <input type="hidden" name="id" value="<?= $quarto['id'] ?>">
                <div class="col-6">
                    <label for="nome" class="form-label">Ocupante:</label>
                    <input disabled value="<?= $nome?>" type="text" id="nome" name="nome" class="form-control" required="">
                </div>
                <div class="col-2">
                    <label for="numero" class="form-label">Nº:</label>
                    <input disabled value="<?= $quarto['numero']?>" type="text" id="numero" name="numero" class="form-control" required="">
                </div>
            </div>
            <div class="row mb-3 mb-4" style="border-bottom: 2px SOLID; padding-bottom: 30px">
                <div class="col-3">
                    <label for="tipo" class="form-label">Tipo:</label>
                    <input disabled value="<?= $quarto['tipo']?>" type="text" id="tipo" name="tipo" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="capacidade" class="form-label">Capacidade:</label>
                    <input disabled value="<?= $quarto['capacidade']?>" type="text" id="capacidade" name="capacidade" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="valor_diaria" class="form-label">Diária:</label>
                    <div class="input-group">
                        <span class="input-group-text">R$</span>
                        <input disabled value="<?= $quarto['preco_diaria']?>" type="text" id="valor_diaria" name="valor_diaria" class="form-control" required="">
                    </div>
                </div>
                <div class="col-3">
                    <label for="status" class="form-label">Status:</label>
                    <input disabled value="<?= $quarto['status']?>" type="text" id="status" name="status" class="form-control" required="">
                </div>
            </div>
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