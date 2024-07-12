<?php

<<<<<<< HEAD
require 'vendor/autoload.php';

use App\Entity\Cliente;
use App\Session\Login;

Login::requireLogin();

$cliente = new Cliente;

define('TITLE', "Cadastrar cliente");

if (isset($_POST['name'], $_POST['cpf'], $_POST['email'])) {
    $cliente->name = $_POST['name'];
    $cliente->cpf = $_POST['cpf'];
    $cliente->email = $_POST['email'];
    $cliente->token = $cliente->gerarToken();

    $cliente->cadastrar();
    
    header('Location: index.php');
    exit;
}

include "includes/header.php";
include "includes/formulario.php";
include "includes/footer.php";

=======
use App\Entity\Vaga;
$vaga = new Vaga;

define('TITLE', 'Cadastrar vaga');

require __DIR__.'/vendor/autoload.php';

// Validação do post
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    $vaga->titulo = $_POST['titulo'];
    $vaga->descricao = $_POST['descricao'];
    $vaga->ativo = $_POST['ativo'];

    $vaga->cadastrar();

    header('Location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
