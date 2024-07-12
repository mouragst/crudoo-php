<?php

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

