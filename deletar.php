<?php

use App\Entity\Vaga;

define('TITLE', 'Editar Vaga');

require __DIR__.'/vendor/autoload.php';

$vaga = vaga::getVaga($_GET['id']);

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

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
