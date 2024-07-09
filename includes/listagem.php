<?php

$resultados = '';

foreach ($vagas as $vaga) {
    $resultados .= '<tr>
                        <td>'.$vaga->id.'</td>
                        <td>'.$vaga->titulo .'</td>
                        <td>'. $vaga->descricao.'</td>
                        <td>'.($vaga->ativo == 's' ? 'Ativo' : 'Inativo').'</td>
                        <td>'.date('d/m/Y à\s H:i', strtotime($vaga->data)).'</td>
                        <td>
                        <a class="btn btn-primary" href="editar.php?&id='.$vaga->id.'">Alterar</a> 
                        |
                        <a class="btn btn-danger" href="deletar.php?&id='.$vaga->id.'">Deletar</a></td>
                    </tr>';
}

$resultados = !empty($resultados) ? $resultados : '<tr>
                                                        <td colspan="6" class="text-center">
                                                            Nenhuma vaga encontrada!
                                                        </td>
                                                  </tr>';

$mensagem = '';

if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        }
}

?>

<main>
    <section>
        <a href="cadastro.php">
            <button class="btn btn-success">Cadastrar vaga</button>
        </a>
    </section>

    <section>
        <form method="get">

            <div class="row my-4">

                <div class="col">
                    <label>Buscar por titulo</label>
                    <input type="text" name="busca" class="form-control">
                </div>

                <div class="col">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">Ativa/Inativa</option>
                        <option value="s">Ativa</option>
                        <option value="n">Inativa</option>
                    </select>
                </div>

                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>

            </div>
        </form>
    </section>

    <section>
        <table class="table bd-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados; ?>
            </tbody>

        </table>
    </section>
</main>