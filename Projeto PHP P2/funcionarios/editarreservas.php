<?php
    require("cabecalho.php");
    require("..\db\conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        try{
            $stmt = $pdo->prepare("SELECT * from reservas WHERE hospede_id = ?");
            $stmt->execute([$_GET['id']]);
            $reserva = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo "Erro ao consultar reserva: ".$e->getMessage();
        }
        try{
            $stmt = $pdo->prepare("SELECT * from quartos WHERE hospede_id = ?");
            if($stmt->execute([$_GET['id']])){
                $quarto = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e){
            echo "Erro ao consultar quartos: ".$e->getMessage();
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $datainicio = $_POST['checkin'];
        $datafim = $_POST['checkout'];
        $valortotal = $_POST['valortotal'];
        $observacoes = $_POST['observacoes'];
        $id = $_POST['id'];
        $hospedeid = $_POST['hospede_id'];
        $apartamento = $_POST['apartamento'];
        try{
            $stmt = $pdo->prepare("UPDATE quartos set hospede_id = ? WHERE tipo = ? LIMIT 1");
            $stmt->execute([$hospedeid, $apartamento]);
        } catch (Exception $e){
            echo "Erro ao atualizar quarto: ".$e->getMessage();
        }
        try{
            $stmt = $pdo->prepare("UPDATE reservas set data_inicio = ?, data_fim = ?, valor_total = ?, observacoes = ? WHERE hospede_id = ?");
            if($stmt->execute([$datainicio, $datafim, $valortotal, $observacoes, $id])){
                header("location: consultarreservas_detalhes.php?id=$hospedeid");
            } else {
                header('location: consultarreservas.php');
            }
        }catch(\Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>
    <div class="container" style="margin-top: 100px;">
        <h1>Editar Reserva</h1>
        <form method="post">
        <div class="row mb-3 mt-5">
                <input type="hidden" name="id" value="<?= $reserva['id'] ?>">
                <input type="hidden" name="hospede_id" value="<?= $reserva['hospede_id'] ?>">
                <div class="col-3">
                    <label for="checkin" class="form-label">Check In:</label>
                    <input value="<?= $reserva['data_inicio']?>" type="date" id="checkin" name="checkin" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="checkout" class="form-label">Check Out:</label>
                    <input value="<?= $reserva['data_fim']?>" type="date" id="checkout" name="checkout" class="form-control" required="">
                </div>
                <div class="col-md-4">
                <label for="apartamento"><strong>Apartamento</strong></label>
                <select class="form-select" name="apartamento" id="apartamento" require="">
                    <option selected>---</option>
                    <option value="suite">Suíte</option>
                    <option value="luxotriplo">Luxo Triplo</option>
                    <option value="luxoduplo">Luxo Duplo</option>
                    <option value="luxocasal">Luxo Casal</option>
                    <option value="luxocasal">Suíte Conjugada</option>
                    <option value="apartamentomini">Apartamento Mini</option>
                </select>
            </div>
            </div>
            <div class="row mb-3" style="border-bottom: 2px SOLID; padding-bottom: 30px">
                <div class="col-3">
                    <label for="status" class="form-label">Status:</label>
                    <input disabled value="<?= $reserva['status']?>" type="text" id="status" name="status" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="valortotal" class="form-label">Valor Total:</label>
                    <input value="<?= $reserva['valor_total']?>" type="text" id="valortotal" name="valortotal" class="form-control" required="">
                </div>
                <div class="col-3">
                    <label for="observacoes" class="form-label">Mensagem:</label>
                    <textarea id="observacoes" name="observacoes" class="form-control forms-label" rows="5"><?=$reserva['observacoes']?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

<?php
    require("rodape.php");
?>