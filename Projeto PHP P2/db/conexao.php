<?php
    $dominio = "mysql:host=localhost;dbname=ontelaria";
    $usuario = "root";
    $senha = ""; #123

    try{
        $pdo = new PDO($dominio, $usuario, $senha);
    } catch(Exception $e){
        die("Erro ao conectar ao banco.".$e->getMessage());
    }
?>