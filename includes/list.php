<?php

use App\db\Pagination;

foreach ($clientes as $cliente) {
        $resultado .= '
        <tr>
            <th>'.$cliente->id.'</th>
            <th>'.$cliente->name.'</th>
            <th>'.$cliente->cpf.'</th>
            <th>'.$cliente->email.'</th>
            <th>'.$cliente->token.'</th>
            <th><a class="btn btn-primary" href="editar.php?&id='.$cliente->id.'">Editar</a> | 
                <a class="btn btn-danger" href="deletar.php?&id='.$cliente->id.'">Deletar</a></th>
        </tr>';
    }

$resultado = !empty($resultado) ? $resultado : '<tr>
                                                    <td colspan="6" class="text-center">
                                                        Nenhuma vaga encontrada!
                                                    </td>
                                                </tr>';



//GETS
unset($_GET['pagina']);
unset($_GET['status']);
$gets = http_build_query($_GET);


// Paginação
$paginas = $pagination->getPages();
$resultadoPaginas = '';
foreach($paginas as $key=>$pagina) {
    $class = $pagina['atual'] ? 'btn-primary' : 'btn-light';
    $resultadoPaginas .= '<a href=?pagina='.$pagina['pagina'].'&'.$gets.'>
                            <button class="btn '.$class.'" type="button">'.$pagina['pagina'].'</button>
                          </a>';
}


?>

<section>
    <a href="cadastro.php">
        <button class="btn btn-success mt-3">Cadastrar cliente</button>
    </a>
</section>

<section>
    <form method="get">

        <div class="row my-2">
            
            <div class="col d-inline">
                <label>Buscar por nome</label>
                <input type="text" name="busca" class="form-control">
            </div>

            <div class="col d-flex align-items-end">
                <button class="btn btn-primary" type="submit">Procurar</button>
            </div>
        </div>
    </form>
</section>


<section>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Token</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?= $resultado; ?>
        </tbody>
    </table>

    <section>
        <?= $resultadoPaginas ?>
    </section>
</section>