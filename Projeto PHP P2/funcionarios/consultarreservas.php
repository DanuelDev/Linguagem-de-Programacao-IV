<?php
    require("cabecalho.php");
    require("../db/conexao.php");
    try{
        $sql = "SELECT 
    r.*,
    e.id,
    e.reserva_id,
    h.nome,
    h.id AS hospede_id, 
    q.id AS quarto_id,
    q.hospede_id AS quarto_hospede_id,
    q.status AS quarto_status
    FROM reservas r
    LEFT JOIN hospedes h ON h.id = r.hospede_id
    LEFT JOIN estadias e ON e.reserva_id = r.id
    LEFT JOIN quartos q ON q.hospede_id = r.hospede_id";

        $stmt = $pdo->query($sql);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
        echo "Erro ao consultar hospedes: ".$e->getMessage();
    }

    

    if (isset($_GET['cadastro']) && $_GET['cadastro']){
        echo"<p class='message-success'><strong>Reserva realizada!</strong></p>";
    } else if (isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo"<p class='message-error'><strong>Erro ao criar reserva!</strong></p>";
    }
    if (isset($_GET['editar']) && $_GET['editar']){
        echo"<p class='message-success'><strong>Reserva editada com sucesso!</strong></p>";
    } else if (isset($_GET['editar']) && !$_GET['editar']){
        echo"<p class='message-error'><strong>Erro ao editar!</strong></p>";
    }
    if (isset($_GET['excluir']) && $_GET['excluir']){
        echo"<p class='message-success'><strong>Reserva excluida com sucesso!</strong></p>";
    } else if (isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo"<p class='message-error'><strong>Erro ao excluir!</strong></p>";
    }

?>

<div class="container container-primary" style="margin-top: 100px">
    <h2>Reservas</h2>
    <a href="prereserva.php" class="btn btn-success mb-3">Nova Reserva</a>
    <table class="table table-hover table-striped" style="margin-top: 20px; margin-bottom: 50px">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($dados as $d):
            ?>
            <tr>
                <td><strong><?= $d['hospede_id'] ?></strong></td>
                <td><?= $d["nome"] ?></td>
                <td><?= $d["data_inicio"] ?></td>
                <td><?= $d["data_fim"] ?></td>
                <td><?= $d["status"] ?></td>
                <td class="d-flex gap-2">
                    <a href="editarreservas.php?id=<?= $d['hospede_id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="consultarreservas_detalhes.php?id=<?= $d['hospede_id'] ?>" class="btn btn-sm btn-info">Consultar</a>

                    <?php if ($d['status'] !== 'confirmada' && $d['quarto_hospede_id'] == $d['hospede_id']): ?>
                        <a href="registrarestadia.php?id=<?= $d['hospede_id'] ?>" class="btn btn-sm btn-success">Confirmar Reserva</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>
<?php
require("rodape.php");
?>