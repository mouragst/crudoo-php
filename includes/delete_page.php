<?php

use App\Entity\Cliente;

$cliente = Cliente::getCliente($_GET['id']);

?>

<form method="post">
    <div class="container">
        <h3>Certeza que quer deletar o cliente</h3>
        <br>
        <br>
        <h5>Nome: <?= $cliente->name ?><br> CPF: <?= $cliente->cpf; ?></h5>
    </div>

    <a href="index.php" class="btn btn-primary mt-5">Cancelar</a> | 
    <button type="submit" class ="btn btn-danger mt-3" name="deletar">Deletar</button>
</form>