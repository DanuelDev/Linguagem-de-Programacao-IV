<?php
    require("cabecalho.php");
    require("../db/conexao.php");
    try{
        $stmt = $pdo->query("SELECT * FROM hospedes");
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
    <h2>Clientes</h2>
    <a href="nova_categoria.php" class="btn btn-success mb-3">Novo Registro</a>
    <table class="table table-hover table-striped" style="margin-top: 20px; margin-bottom: 50px">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($dados as $d):
            ?>
            <tr>
                <td><strong><?= $d['id'] ?></strong></td>
                <td><?= $d['nome'] ?></td>
                <td><?= $d['email'] ?></td>
                <td><?= $d['telefone'] ?></td>
                <td class="d-flex gap-2">
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