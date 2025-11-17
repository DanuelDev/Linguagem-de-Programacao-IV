
<?php
    require("cabecalho.php");
    require("..\db\conexao.php");

    function calcularDias($checkin, $checkout) {
        $data_inicio = new DateTime($checkin);
        $data_fim = new DateTime($checkout);
        
        $diferenca = $data_inicio->diff($data_fim);
        
        return $diferenca->days;
    }

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
        $totaldias = calcularDias($checkindata, $checkoutdata);
        
        $valor = $_POST['valor'];
        $mensagem = $_POST['mensagem'];
        
        $apartamento = $_POST['apartamento'];
        try{
            $stmt = $pdo->prepare('INSERT INTO reservas (hospede_id, data_inicio, data_fim, valor_total, observacoes) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$hospede_id, $checkindata, $checkoutdata, $valor, $mensagem]);
            header("location: index.php");

        }catch(Exception $e){
            echo 'Erro ao inserir: '.$e->getMessage();
        }
    }
?>

<!--Controle de reservas em hotéis-->
<div class="container">
    
    <div class="container container-title" style="border-color: #212529; background-color: #212529;">
        <h3 class="text-center forms-title">Registrar Reserva</h3>
    </div>
    <form action="" method="post">
    <!--=======================================-->
    <div class="container container-forms" style="border-color: #212529;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" class="form-control forms-label" name="nome" id="nome" require="">
            </div>
            <div class="col-md-4">
                <label for="valor"><strong>Valor</strong></label>
                <div class="input-group">
                    <span class="input-group-text">R$</span>
                    <input type="text" class="form-control forms-label" name="valor" id="valor" require="">
                </div>
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
        <div class="row pt-2 justify-content-center">
            <div class="col-md-4">
                <label for="apartamento"><strong>Apartamento</strong></label>
                <select class="form-select forms-label" name="apartamento" id="apartamento" require="">
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