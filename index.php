<?php

require __DIR__.'/vendor/autoload.php';

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
