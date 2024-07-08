<?php

use App\Entity\Vaga;

define('TITLE', 'Editar Vaga');

require __DIR__.'/vendor/autoload.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

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
