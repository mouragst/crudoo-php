<?php

require __DIR__.'/vendor/autoload.php';

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