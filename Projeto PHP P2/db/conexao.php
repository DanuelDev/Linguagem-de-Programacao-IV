<?php
    // Conexão com o banco de dados
    $dominio = "mysql:host=localhost;dbname=ontelaria";
    $usuario = "root";
    $senha = ""; 

    try{
        // Criar a conexão PDO
        $pdo = new PDO($dominio, $usuario, $senha);
    } catch(Exception $e){
        die("Erro ao conectar ao banco.".$e->getMessage());
    }
?>