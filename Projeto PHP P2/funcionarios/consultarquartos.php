<?php
    require("cabecalho.php");
    require("../db/conexao.php");
    try{
        $stmt = $pdo->query("SELECT * FROM quartos");
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

<div class="container" style="margin-top: 100px">
    <h2>Quartos</h2>
    <table class="table table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Nº Quarto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
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
                    if($retorno){
                        $nome = $retorno['nome'];
                    }else{
                        $nome = '';
                    }
                }
                catch(Exception $e){
                    echo "Erro ao consultar quartos: ".$e->getMessage();
                }
                ?>
                <td><strong><?= $d['id'] ?></strong></td>
                <td><?= $nome ?></td>
                <td><?= $d['numero'] ?></td>
                <td><?= $d['tipo'] ?></td>
                <td><?= $d['status'] ?></td>
                <td class="d-flex gap-2">
                    <a href="editarquartos.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="consultarquartos_detalhes.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
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