
<?php 
    include "cabecalho.php";
    require("..\db\conexao.php");
    // Definir fuso horário e data mínima para o check-in
    date_default_timezone_set("America/Sao_Paulo");
    $data = date("Y-m-d", strtotime("+1 day"));

    // Função para calcular a diferença em dias entre duas datas (não está sendo utilizado)
    function calcularDias($checkin, $checkout) {
        $data_inicio = new DateTime($checkin);
        $data_fim = new DateTime($checkout);
        
        $diferenca = $data_inicio->diff($data_fim);
        
        return $diferenca->days;
    }
    // Consultar todas as reservas
    try{
        $stmt = $pdo->query("SELECT * FROM reservas");
        $reservas = $stmt->fetchAll();
    }catch(Exception $e){
        echo "Erro ao consultar reservas: ".$e->getMessage();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Procura no database pelo id do usuário
        $hospede_id = $_SESSION['id'];
        $checkindata = $_POST['checkindata'];
        $checkoutdata = $_POST['checkoutdata'];
        
        $mensagem = $_POST['mensagem'];
        
        $criancas = $_POST['criancas'];
        $adultos = $_POST['adultos'];
        $capacidade = intval($criancas) + intval($adultos);
        try{
            // Verificar se já existe uma reserva para o hóspede
            $sql = "SELECT * FROM reservas WHERE hospede_id = :hospede_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':hospede_id', $_SESSION['id']);
            $stmt->execute();

            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$retorno) {
                // Inserir a nova reserva
                $stmt = $pdo->prepare('INSERT INTO reservas (hospede_id, data_inicio, data_fim, observacoes) VALUES (?, ?, ?, ?)');
                $stmt->execute([$hospede_id, $checkindata, $checkoutdata, $mensagem]);
            } else {
                echo "<p class='text-center message-warning'><strong>Atenção, já há uma reserva nesse nome!</strong></p>";
            }
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
        <div class="row pt-2 justify-content-center">
            <div class="col-md-2">
                <label for="checkindata"><strong>Check-In</strong></label>
                <input type="date" class="form-control forms-label" min="<?=$data?>" name="checkindata" id="checkindata" require="">
            </div>
            <div class="col-md-2">
                <label for="checkoutdata"><strong>Check-Out</strong></label>
                <input type="date" class="form-control forms-label" min="<?=$data?>" name="checkoutdata" id="checkoutdata" require="">
            </div>
            <div class="col-md-2">
                <label for="adultos"><strong>Adultos</strong></label>
                <select class="form-select forms-label" name="adultos" id="adultos" require="">
                    <option selected>---</option>
                    <?php for($i=1; $i <= 8; $i++):?>
                    <option value=<?=$i?>><?=$i?></option>
                    <?php endfor; ?>;
                </select>
            </div>
            <div class="col-md-2">
                <label for="criancas"><strong>Crianças</strong></label>
                <select class="form-select forms-label" name="criancas" id="criancas" require="">
                    <option selected>---</option>
                    <?php for($i=1; $i <= 8; $i++):?>
                    <option value=<?=$i?>><?=$i?></option>
                    <?php endfor; ?>;
                </select>
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
                <textarea class="form-control forms-label" name="mensagem" id="mensagem" rows="4"></textarea>
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