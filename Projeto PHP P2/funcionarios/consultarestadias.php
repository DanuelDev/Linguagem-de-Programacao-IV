<?php
    require("cabecalho.php");
    require("../db/conexao.php");
    try{
        $sql = "SELECT 
                e.id AS estadia_id,
                e.data_checkin,
                e.data_checkout,
                e.status AS estadia_status,

                r.id AS reserva_id,
                r.data_inicio,
                r.data_fim,
                r.status AS reserva_status,

                h.id AS hospede_id,
                h.nome AS hospede_nome,

                q.id AS quarto_id,
                q.numero AS quarto_numero,
                q.status AS quarto_status
            FROM estadias e
            JOIN reservas r ON r.id = e.reserva_id
            JOIN hospedes h ON h.id = r.hospede_id
            JOIN quartos q ON q.id = e.quarto_id";

    $stmt = $pdo->query($sql);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(\Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<div class="container" style="margin-top: 100px">
    <h2>Estadias</h2>
    <table class="table table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Nº Quarto</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($dados as $d):
            ?>
            <tr>
                <td><strong><?= $d['estadia_id'] ?></strong></td>
                <td><?= $d['hospede_nome'] ?></td>
                <td><?= $d['quarto_numero'] ?></td>
                <td><?= $d['estadia_status'] ?></td>
                <td class="d-flex gap-2">
                    <a href="consultarquartos_detalhes.php?id=<?= $d['quarto_id'] ?>" class="btn btn-sm btn-info">Consultar</a>
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