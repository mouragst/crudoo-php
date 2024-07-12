<?php

require __DIR__.'/vendor/autoload.php';
use App\Entity\Cliente;
use App\Session\Login;

Login::requireLogin();

define('TITLE', "Editar cliente");

if (isset($_GET['id'])) {
    $cliente = Cliente::getCliente($_GET['id']);
}

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['name'], $_POST['cpf'], $_POST['email'])) {
    $cliente->name = $_POST['name'];
    $cliente->cpf = $_POST['cpf'];
    $cliente->email = $_POST['email'];
    $cliente->token = $cliente->token;

    $cliente->atualizar();
}

include "includes/header.php";
include "includes/formulario.php";
include "includes/footer.php";
