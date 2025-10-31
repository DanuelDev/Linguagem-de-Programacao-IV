<?php
  session_start();
  if(!isset($_SESSION['acesso']))
    header('location: ..\index.php');
?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OnTelaria</title>
<link rel="icon" type="image/x-icon" href="../images/icon.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link href="..\forms_style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar">
  <div class="container">
    
    <a class="navbar-brand" href="#">
      <span>
        <img src="..\images\ico-transparent.png" style="width: 50px; height: 50px; border: solid 3px white; border-radius: 30px;">
        <strong>nTelaria</strong>
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">O Hotel</a>
      </li>
          
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Serviços
        </a>
        <ul class="dropdown-menu" style="text-align:center;" aria-labelledby="dropdown1">
          <li><a class="dropdown-item dropdown-content" href="prereserva.php"><i class="bi bi-calendar-check-fill"></i> Registrar Cliente</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-fork-knife"></i> Administrar Quartos</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-speaker-fill"></i> Administrar Eventos</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Contato
        </a>
        <ul class="dropdown-menu" style="text-align:center;" aria-labelledby="dropdown2">
          <li><a class="dropdown-item" href="#"><i class="bi bi-telephone-fill"></i> Fale conosco</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-clipboard2-check-fill"></i> Pesquisa de satisfação</a></li>
        </ul>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="color: white;">
        <li><p style="padding-right: 15px; margin-top: 15px; border-right: 3px solid white;"><strong><?= $_SESSION['nome'] ?></strong></p></li>
        <li><a href="..\logout.php" class="nav-link active" style="color: #ff751f; padding-top: 15px;"><strong>Sair</strong> <i class="bi bi-door-open"></i></a></li>
      </ul>
    </div>
  </div>
</nav>