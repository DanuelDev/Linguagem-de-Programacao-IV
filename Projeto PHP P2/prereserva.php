
<?php include "cabecalho.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        header("location: login.php");
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
            <div class="col-8">
                <p class="p-form">
                Antecipe sua estadia dos sonhos com nossa Pré-Reserva exclusiva! <br><strong>Faça login</strong> para garantir seu quarto favorito antes de sua chegada.
                </p>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col text-center">
                <button type="submit" class="btn checkin-button mb-3"><i class="bi bi-pencil-fill"></i><strong> Fazer login</strong></button>
            </div>
        </div>
    </div>
    </form>
    <br>
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
    </div>
</div>
<br>

<?php include "rodape.php" ?>