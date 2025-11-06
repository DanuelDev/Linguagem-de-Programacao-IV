<?php
    require("cabecalho.php");
    require("../db/conexao.php");
    try{
        $stmt = $pdo->query("SELECT * FROM reservas");
        $dados = $stmt->fetchAll();
    } catch(\Exception $e){
        echo "Erro: ".$e->getMessage();
    }

    

    if (isset($_GET['cadastro']) && $_GET['cadastro']){
        echo "<p class='text-success'>Cadastro realizado!</p>";
    } else if (isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo "<p class='text-danger'>Erro ao cadastrar!</p>";
    }
    if (isset($_GET['editar']) && $_GET['editar']){
        echo "<p class='text-success'>Registro editado!</p>";
    } else if (isset($_GET['editar']) && !$_GET['editar']){
        echo "<p class='text-danger'>Erro ao editar!</p>";
    }
    if (isset($_GET['excluir']) && $_GET['excluir']){
        echo "<p class='text-success'>Registro excluído!</p>";
    } else if (isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo "<p class='text-danger'>Erro ao excluir!</p>";
    }
?>

<div class="container container-primary" style="margin-top: 100px">
    <h2>Reservas</h2>
    <a href="prereserva.php" class="btn btn-success mb-3">Nova Reserva</a>
    <table class="table table-hover table-striped" style="margin-top: 20px; margin-bottom: 50px">
        <thead>
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
                <?php 
                try{
                    $sql = "SELECT nome FROM hospedes WHERE id = :hospede_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':hospede_id', $d['hospede_id']);
                        $stmt->execute();

                    $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
                    $nome = $retorno['nome'];
                }
                catch(Exception $e){
                    echo "Erro ao consultar hospedes: ".$e->getMessage();
                }
                ?>
                <td><?= $d['hospede_id'] ?></td>
                <td><?= $nome ?></td>
                <td><?= $d['data_inicio'] ?></td>
                <td><?= $d['data_fim'] ?></td>
                <td><?= $d['status'] ?></td>
                <td class="d-flex">
                    <a href="editar_categoria.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="consultar_categoria.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
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