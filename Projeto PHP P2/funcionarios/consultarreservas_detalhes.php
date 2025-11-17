<?php
    require("cabecalho.php");
    require("../db/conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        try{
            $stmt = $pdo->prepare("SELECT * from reservas WHERE hospede_id = ?");
            $stmt->execute([$_GET['id']]);  
            $reserva = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmt = $pdo->prepare("SELECT * from hospedes WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $hospede = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo "Erro ao consultar reserva: ".$e->getMessage();
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        try{
            $stmt = $pdo->prepare("DELETE FROM reservas WHERE hospede_id = ?");
            if($stmt->execute([$id])){
                $stmt = $pdo->prepare("UPDATE quartos set status = ?, hospede_id = ? WHERE hospede_id = ?");
                $stmt->execute(['disponivel', 0, $id]);
                header("location: consultarreservas.php?excluir=true");
            } else {
                header('location: consultarreservas.php?excluir=false');
            }

        }catch(\Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>
    <div class="container mb-5" style="margin-top: 100px;">
        <h1 class="no-print">Consultar reserva</h1>
        <form method="post">
            <div class="row mb-3 mt-5">
                <input type="hidden" name="id" value="<?= $hospede['id'] ?>">
                <div class="col-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input disabled value="<?= $hospede['nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
                </div>
                <div class="col-5">
                    <label for="email" class="form-label">Email:</label>
                    <input disabled value="<?= $hospede['email']?>" type="text" id="email" name="email" class="form-control" required="">
                </div>
            </div>
            <div class="row mb-3 mb-4" style="border-bottom: 2px SOLID; padding-bottom: 30px">
                <div class="col-3">
                    <label for="data_inicio" class="form-label">Check-In:</label>
                    <input disabled value="<?= $reserva['data_inicio']?>" type="text" id="data_inicio" name="data_inicio" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="data_fim" class="form-label">Check-Out:</label>
                    <input disabled value="<?= $reserva['data_fim']?>" type="text" id="data_fim" name="data_fim" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="status" class="form-label">Status:</label>
                    <input disabled value="<?= $reserva['status']?>" type="text" id="status" name="status" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="valor_total" class="form-label">Valor Total:</label>
                    <div class="input-group">
                        <span class="input-group-text">R$</span>
                        <input disabled value="<?= $reserva['valor_total']?>" type="text" id="valor_total" name="valor_total" class="form-control" required="">
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 no-print" >
                <button type="submit" class="btn btn-danger no-print">Excluir</button>
                <button onclick="history.back();" type="button" class="btn btn-secondary no-print">Voltar</button>
                <button class="btn btn-secondary no-print" onclick="window.print()">Imprimir</button>
            </div>
        </form>
    </div>

<?php
    require("rodape.php");
?>