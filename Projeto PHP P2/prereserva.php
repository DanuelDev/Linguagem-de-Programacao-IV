
<?php include "cabecalho.php" ?>
<!--Controle de reservas em hotéis-->
<div class="container">
    <div class="container container-title">
        <h3 class="text-center forms-title">Pré-Reserva</h3>
    </div>
    <!--=======================================-->
    <div class="container container-forms">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" class="form-control forms-label" name="nome" id="nome" require="">
            </div>
            <div class="col-md-4">
                <label for="cidade"><strong>Cidade</strong></label>
                <input type="text" class="form-control forms-label" name="cidade" id="cidade" require="">
            </div>
            <div class="col-md-3">
                <label for="estado"><strong>Estado</strong></label>
                <input type="text" class="form-control forms-label" name="estado" id="estado" require="">
            </div>
        </div>
        <br> <!--=======================================-->
        <div class="row pt-2 justify-content-center">
            <div class="col-md-6">
                <label for="email"><strong>Email</strong></label>
                <input type="password" class="form-control forms-label" name="email" id="email" require="">
            </div>
            <div class="col-md-6">
                <label for="telefone"><strong>Telefone</strong></label>
                <input type="text" class="form-control forms-label" name="telefone" id="telefone" require="">
            </div>
        </div>
        <br> <!--=======================================-->
        <div class="row pt-2 justify-content-center">
            <div class="col-md-2">
                <label for="checkindata"><strong>Check-In</strong></label>
                <input type="text" class="form-control forms-label" name="checkindata" id="checkindata" placeholder="dia/mês" require="">
            </div>
            <div class="col-md-2">
                <label for="checkoutdata"><strong>Check-In</strong></label>
                <input type="text" class="form-control forms-label" name="checkoutdata" id="checkoutdata" placeholder="dia/mês" require="">
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
            <div class="col-md-4">
                <label for="criancas"><strong>Apartamento</strong></label>
                <select class="form-select forms-label" name="criancas" id="criancas" require="">
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
        <br> <!--=======================================-->
        <div class="row pt-2">
            <p>Check-in a partir das <strong>14hs</strong></p>
        </div>
        <!--=======================================-->
        <div class="row pt-2 justify-content-center">
            <div class="col-md-12 pb-3">
                <label for="mensagem"><strong>Mensagem</strong> <i class="text-muted">*opcional</i></label>
                <textarea class="form-control forms-label" id="mensagem" rows="3"></textarea>
            </div>
        </div>
    </div>
    <div class="row pt-3 pb-3 justify-content-center">
        <div class="col-md-2 text-center">
            <button type="submit" class="btn checkin-button"><strong>Fazer Pré-Reserva</strong></button>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<?php include "rodape.php" ?>