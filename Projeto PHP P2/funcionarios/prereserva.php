
<?php
    require("cabecalho.php");
    require("..\db\conexao.php");
    try{
        $stmt = $pdo->query("SELECT * FROM reservas");
        $reservas = $stmt->fetchAll();
    }catch(Exception $e){
        echo "Erro ao consultar reservas: ".$e->getMessage();
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Procura no database pelo id do usuário baseado no nome
        try{
            $sql = "SELECT id FROM hospedes WHERE nome = :nome";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $_POST['nome']);
             $stmt->execute();
    
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            $hospede_id = $retorno['id'];
        }
        catch(Exception $e){
            echo "Erro ao consultar hospedes: ".$e->getMessage();
        }
        $checkindata = $_POST['checkindata'];
        $checkoutdata = $_POST['checkoutdata'];
        $valor = $_POST['valor'];
        $mensagem = $_POST['mensagem'];
        try{
            $stmt = $pdo->prepare('INSERT INTO reservas (hospede_id, data_inicio, data_fim, valor_total, observacoes) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$hospede_id, $checkindata, $checkoutdata, $valor, $mensagem]);
        }catch(Exception $e){
            echo 'Erro ao inserir: '.$e->getMessage();
        }
    }
?>

<!--Controle de reservas em hotéis-->
<div class="container">
    
    <div class="container container-title">
        <h3 class="text-center forms-title">Pré-Reserva</h3>
    </div>
    <form action="" method="post">
    <!--=======================================-->
    <div class="container container-forms">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" class="form-control forms-label" name="nome" id="nome" require="">
            </div>
            <div class="col-md-5">
                <label for="valor"><strong>Valor</strong></label>
                <input type="text" class="form-control forms-label" name="valor" id="valor" require="">
            </div>
        </div>
        <br> <!--=======================================-->
        <div class="row pt-2 justify-content-center">
            <div class="col-md-2">
                <label for="checkindata"><strong>Check-In</strong></label>
                <input type="date" class="form-control forms-label" name="checkindata" id="checkindata" placeholder="dia/mês" require="">
            </div>
            <div class="col-md-2">
                <label for="checkoutdata"><strong>Check-Out</strong></label>
                <input type="date" class="form-control forms-label" name="checkoutdata" id="checkoutdata" placeholder="dia/mês" require="">
            </div>
        </div>
        <br> <!--=======================================-->
        <div class="row pt-2">
            <p>Check-in a partir das <strong>14hs</strong></p>
        </div>
        <!--=======================================-->
        <div class="row pt-2 justify-content-center">
            <div class="col-md-12 pb-3">
                <label for="mensagem"><strong>Mensagem</strong> <i class="text-muted">*opcional</i></label>
                <textarea class="form-control forms-label" id="mensagem" name="mensagem" rows="4"></textarea>
            </div>
        </div>
    </div>
    <br>
    <div class="row pt-3 pb-3 justify-content-center">
        <div class="col-md-2 text-center">
            <button type="submit" class="btn checkin-button"><i class="bi bi-pencil-fill"></i><strong> Fazer Pré-Reserva</strong></button>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="h2-title"><strong>Sua Jornada Rumo ao Descanso Começa Aqui</strong>.<h2>
                <p class="p1">
                A ansiedade pela viagem é parte da magia. Enquanto você sonha com os momentos que estão por vir, nós preparamos tudo para que sua estadia seja perfeita.<br><br>
                Faça já a sua Pré-Reserva e garanta o seu refúgio. Deixaremos o café quentinho, os lenços macios e o silêncio prontos para acalmar a sua mente e alma. 
                Você só precisa se preocupar em chegar e se entregar ao descanso. Estamos de braços abertos para recebê-lo!
                </p>
            </div>
        </div>
        </form>
    </div>
</div>
<br>

<?php include "rodape.php" ?>