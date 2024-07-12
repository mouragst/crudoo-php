<?php

require __DIR__.'/vendor/autoload.php';

<<<<<<< HEAD
use App\Entity\Cliente;
use App\db\Pagination;
use App\Session\Login;

Login::requireLogin();

//BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_UNSAFE_RAW);

// CONDIÇÕES
$conditions = [
    !empty($busca) ? 'name LIKE "%'.str_replace(' ', '%', $busca).'%"' : null
];

// WHERE
$where = implode(' AND ', $conditions);

// Paginação
$qtd = (new Cliente)::getQuantidadeClientes($where);
$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1);

// echo '<pre>';
// print_r($pagination->getPages());
// echo '</pre>';
// exit;

$clientes = Cliente::getClientes($where, null, $pagination->getLimit());

include "includes/header.php";
include "includes/list.php";
include "includes/footer.php";
=======
use \App\Entity\Vaga;

//BUSCA
$buscaFilter = filter_input(INPUT_GET, 'busca', FILTER_UNSAFE_RAW);

// STATUS
$statusFilter = filter_input(INPUT_GET, 'status', FILTER_UNSAFE_RAW);
$statusFilter = in_array($statusFilter, ['s', 'n']) ? $statusFilter : '';

$condicoes = [
    !empty($buscaFilter) ? 'titulo LIKE "%'.str_replace(' ', '%', $buscaFilter).'%"' : null,
    !empty($statusFilter) ? 'ativo = "'.$statusFilter.'"' : null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

// echo '<pre>';
// print_r($where);
// echo '</pre>';
// exit;

$vagas = vaga::getVagas($where);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
