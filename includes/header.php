<?php

use App\Session\Login;

$loggedUser = Login::getUserLogged();

$user = $loggedUser ? $loggedUser['user'].' <a href="logout.php" class="text-light fw-bold ms-2"> Deslogar</a>' : 
'Visitante <a href="login.php" class="text-light fw-bold ml-2"> Entrar</a>';

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Orientado a Objetos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-dark text-light">

  <!-- Inicio do container -->
    <div class="container">
        <div class="mt-3 p-2 bg-secondary text-white rounded">
            <h1>Crud OO</h1>
            <p>Prática de Orientado a Objetos</p>

            <hr class="border-light">

            <div class="d-flex justify-content-start">
              <?= $user ?>
            </div>
        </div>



