<?php

<<<<<<< HEAD
require __DIR__.'/vendor/autoload.php';
use App\Entity\Cliente;
use App\Session\Login;

Login::requireLogin();

define('TITLE', "Editar cliente");

if (isset($_GET['id'])) {
    $cliente = Cliente::getCliente($_GET['id']);
}

if (!isset($_GET['id'])) {
=======
use App\Entity\Vaga;

define('TITLE', 'Editar Vaga');

require __DIR__.'/vendor/autoload.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
    header('Location: index.php');
    exit;
}

<<<<<<< HEAD
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
=======
$vaga = vaga::getVaga($_GET['id']);

if (!$vaga instanceof Vaga) {
    header('Location: index.php');
    exit;
}


if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {

    $vaga->titulo = $_POST['titulo'];
    $vaga->descricao = $_POST['descricao'];
    $vaga->ativo = $_POST['ativo'];

    $vaga->atualizar();

    header('Location: index.php?status=success');
    exit;
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
