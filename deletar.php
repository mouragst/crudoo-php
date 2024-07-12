<?php

<<<<<<< HEAD
use App\Entity\Cliente;
use App\Session\Login;

Login::requireLogin();

require __DIR__.'/vendor/autoload.php';

$cliente = new Cliente;

if (!isset($_GET['id'])) {
=======
use App\Entity\Vaga;

define('TITLE', 'Editar Vaga');

require __DIR__.'/vendor/autoload.php';

$vaga = vaga::getVaga($_GET['id']);

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
    header('Location: index.php');
    exit;
}

<<<<<<< HEAD
if (isset($_POST['deletar'])) {
    $cliente->deletar($_GET['id']);
    header('Location: index.php?&status=success');
    exit;
}

include "includes/header.php";
include "includes/delete_page.php";
include "includes/footer.php";

?>
=======
if (!$vaga instanceof Vaga) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['excluir'])) {
    $vaga->deletar($_GET['id']);
    header('Location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
