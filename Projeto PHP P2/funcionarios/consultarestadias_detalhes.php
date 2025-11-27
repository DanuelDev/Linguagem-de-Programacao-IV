<?php
    require("cabecalho.php");
    require("../db/conexao.php");
    // Consultar os detalhes de uma estadia específica
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        try{
            // Buscar a estadia junto com quarto e dados da reserva/hóspede (quando existir)
            $sql = "SELECT 
                        e.*,
                        q.id AS quarto_id,
                        q.numero,
                        q.tipo,
                        q.capacidade,
                        q.preco_diaria,
                        q.status AS status_quarto,
                        r.hospede_id AS reserva_hospede_id,
                        h.id AS hospede_id,
                        h.nome AS hospede_nome
                    FROM estadias e
                    LEFT JOIN quartos q ON q.id = e.quarto_id
                    LEFT JOIN reservas r ON r.id = e.reserva_id
                    LEFT JOIN hospedes h ON h.id = r.hospede_id
                    WHERE e.id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_GET['id']]);
            $estadia = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo "Erro ao consultar estadia/quarto: ".$e->getMessage();
        }
    }
?>
    <div class="container mb-5" style="margin-top: 100px;">
        <h1 class="no-print">Detalhes da Estadia</h1>
         <form method="post">
             <div class="row mb-3 mt-5">
                 <input type="hidden" name="id" value="<?= $estadia['id'] ?>">
                 <div class="col-6">
                     <label for="nome" class="form-label">Ocupante:</label>
                     <input disabled value="<?= $estadia['hospede_nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
                 </div>
                 <div class="col-2">
                     <label for="numero" class="form-label">Nº:</label>
                     <input disabled value="<?= $estadia['numero']?>" type="text" id="numero" name="numero" class="form-control" required="">
                 </div>
             </div>
            <div class="row mb-3">
                <div class="col-3">
                    <label for="checkin" class="form-label">Check-In:</label>
                    <input disabled value="<?= $estadia['data_checkin'] ?>" type="text" id="checkin" name="checkin" class="form-control">
                </div>
                <div class="col-3">
                    <label for="checkout" class="form-label">Check-Out:</label>
                    <input disabled value="<?= $estadia['data_checkout'] ?>" type="text" id="checkout" name="checkout" class="form-control">
                </div>
                <div class="col-3">
                    <label for="status_estadia" class="form-label">Status Estadia:</label>
                    <input disabled value="<?= $estadia['status'] ?>" type="text" id="status_estadia" name="status_estadia" class="form-control">
                </div>
            </div>
             <div class="row mb-3 mb-4" style="border-bottom: 2px SOLID; padding-bottom: 30px">
                 <div class="col-3">
                     <label for="tipo" class="form-label">Tipo:</label>
                     <input disabled value="<?= $estadia['tipo']?>" type="text" id="tipo" name="tipo" class="form-control" required="">
                 </div>
                 <div class="col-3">
                     <label for="capacidade" class="form-label">Capacidade:</label>
                     <input disabled value="<?= $estadia['capacidade']?>" type="text" id="capacidade" name="capacidade" class="form-control" required="">
                 </div>
                 <div class="col-3">
                     <label for="valor_diaria" class="form-label">Diária:</label>
                     <div class="input-group">
                         <span class="input-group-text">R$</span>
                         <input disabled value="<?= $estadia['preco_diaria']?>" type="text" id="valor_diaria" name="valor_diaria" class="form-control" required="">
                     </div>
                 </div>
             </div>
             <div class="d-flex gap-2 no-print" >
                 <button onclick="history.back();" type="button" class="btn btn-secondary no-print">Voltar</button>
                 <a class="btn btn-secondary no-print" onclick="window.print()">Imprimir</a>
             </div>
         </form>
    </div>

<?php
    require("rodape.php");
?>