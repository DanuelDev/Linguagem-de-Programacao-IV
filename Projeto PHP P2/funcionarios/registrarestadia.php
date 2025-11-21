<?php
    require("cabecalho.php");
    require("..\db\conexao.php");
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // Buscar a reserva e o quarto do hóspede pelo ID fornecido na URL
        try{
            $stmt = $pdo->prepare("SELECT * from reservas WHERE hospede_id = ?");
            $stmt->execute([$_GET['id']]);
            $reserva = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo "Erro ao registrar estadia: ".$e->getMessage();
        }
        // Buscar o quarto associado ao hóspede
        try{
            $stmt = $pdo->prepare("SELECT * from quartos WHERE hospede_id = ?");
            if($stmt->execute([$_GET['id']])){
                $quarto = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e){
            echo "Erro ao registrar estadia: ".$e->getMessage();
        }
        // Inserir a estadia no banco de dados
        if($quarto['hospede_id'] == $reserva['hospede_id']){
            $stmt = $pdo->prepare("INSERT INTO estadias (reserva_id, quarto_id, data_checkin, data_checkout, valor_estadia, observacoes) VALUES (?, ?, ?, ?, ?, ?)");
            if($stmt->execute([$reserva['id'], $quarto['id'], $reserva['data_inicio'], $reserva['data_fim'], $reserva['valor_total'], $reserva['observacoes']])){
                // Atualizar o status do quarto para 'indisponivel'
                $stmt = $pdo->prepare("UPDATE quartos set status = ? WHERE id = ?");
                $stmt->execute(['indisponivel', $quarto['id']]);

                // Atualizar o status da reserva para 'confirmada'
                $stmt = $pdo->prepare("UPDATE reservas set status = ? WHERE id = ?");
                $stmt->execute(['confirmada', $reserva['id']]);
                header("location: index.php");
            }else {
                header("location: consultarquartos.php");
            }
        }
    }
?>