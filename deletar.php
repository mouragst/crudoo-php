<?php

use App\Entity\Cliente;
use App\Session\Login;

Login::requireLogin();

require __DIR__.'/vendor/autoload.php';

$cliente = new Cliente;

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['deletar'])) {
    $cliente->deletar($_GET['id']);
    header('Location: index.php?&status=success');
    exit;
}

include "includes/header.php";
include "includes/delete_page.php";
include "includes/footer.php";

?>