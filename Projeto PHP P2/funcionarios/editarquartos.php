<?php
    require("cabecalho.php");
    require("..\db\conexao.php");
    // Editar um quarto existente
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
    // Processar o formulário de edição
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $numero = $_POST["numero"];
        $tipo = $_POST["tipo"];
        $capacidade = $_POST["capacidade"];
        $preco_diaria = $_POST["precodiaria"];
        $descricao = $_POST["mensagem"];
        $status = $_POST["status"];
        $id = $_POST['id'];
        try{
            // Atualizar o quarto no banco de dados
            $stmt = $pdo->prepare("UPDATE quartos set tipo = ?, capacidade = ?, preco_diaria = ?, descricao = ?, status = ? WHERE id = ?");
            if($stmt->execute([$tipo, $capacidade, $preco_diaria, $descricao, $status, $id])){
                header("location: consultarquartos_detalhes.php?id=$id");
            } else {
                header('location: consultarquartos.php');
            }
        }catch(\Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>
    <div class="container" style="margin-top: 100px;">
        <h1>Editar Quarto</h1>
        <form method="post">
        <div class="row mb-3 mt-5">
            <input type="hidden" name="id" value="<?= $quarto['id'] ?>">
            <div class="col-6">
                <label for="nome" class="form-label">Ocupante:</label>
                <input disabled value="<?= $nome?>" type="text" id="nome" name="nome" class="form-control" required="">
            </div>
            <div class="col-3">
                <label for="status" style="margin-top: 9px">Status</label>
                <select class="form-select" name="status" id="status" require="">
                    <option selected value="<?= $quarto['status'] ?>"><?= $quarto['status']?></option>
                    <option value="disponivel">Disponível</option>
                    <option value="indisponivel">Indisponivel</option>
                    <option value="manutencao">Manutenção</option>
                </select>
            </div>
            <div class="col-2 pt-3 pb-3">
                <label for="numero"><strong>Nº Quarto</strong></label>
                <input value="<?= $quarto['numero']?>" type="text" class="form-control" name="numero" id="numero" required>
            </div>
        </div>
        <div class="row mb-3 mb-4" style="border-bottom: 2px SOLID; padding-bottom: 30px">
            <div class="col-5">
                    <label for="tipo" style="margin-top: 9px">Tipo</label>
                    <select class="form-select" name="tipo" id="tipo" require="">
                        <option selected value="<?= $quarto['tipo'] ?>"><?= $quarto['tipo'] ?></option>
                        <option value="suite">Suíte</option>
                        <option value="luxotriplo">Luxo Triplo</option>
                        <option value="luxoduplo">Luxo Duplo</option>
                        <option value="luxocasal">Luxo Casal</optioI>
                        <option value="suiteconjugada">Suíte Conjugada</option>
                        <option value="apartamentomini">Apartamento Mini</option>
                    </select>
                </div>
            <div class="col-3">
                <label for="capacidade" class="form-label">Capacidade:</label>
                <input value="<?= $quarto['capacidade']?>" type="text" id="capacidade" name="capacidade" class="form-control" required="">
            </div>
            <div class="col-3">
                <label for="precodiaria" class="form-label">Diária:</label>
                <div class="input-group">
                    <span class="input-group-text">R$</span>
                    <input value="<?= $quarto['preco_diaria']?>" type="text" id="precodiaria" name="precodiaria" class="form-control" required="">
                </div>
            </div>
        </div>
        <div class="row pt-2 justify-content-center">
            <div class="col-md-12 pb-3">
                <label for="mensagem"><strong>Mensagem</strong> <i class="text-muted">*opcional</i></label>
                <textarea class="form-control forms-label" id="mensagem" name="mensagem" rows="4"></textarea>
            </div>
        </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

<?php
    require("rodape.php");
?>