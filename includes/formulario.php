<main>
<<<<<<< HEAD
    <section>
        <a href="index.php">
            <button class="btn btn-primary">Voltar</button>
        </a>
    </section>
    <hr>
    <h2 class><?= TITLE ?></h2>


    <form method="post">
        <div class="form-group">
            <label>Nome: </label>
            <input type="text" class="form-control" name="name" value="<?php echo $cliente->name?>" placeholder="Digite o nome">
        </div>
        <div class="form-group">
            <label>CPF: </label>
            <input type="number" class="form-control" name="cpf" value="<?php echo $cliente->cpf?>"placeholder="Digite o cpf">
        </div>
        <div class="form-group">
            <label>Email: </label>
            <input type="email" class="form-control" name="email" value="<?php echo $cliente->email?>"placeholder="Digite o email">
        </div>
        <div class="form-group">
            <label>Token de Acesso: </label>
            <input type="token" class="form-control" name="token" value="<?php echo $cliente->token?>" disabled>
        </div>
        <button class="btn btn-success mt-3" type="submit">Enviar cadastro</button>
=======

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE ?></h2>

    <form method="post">
        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="titulo" value="<?= $vaga->titulo?>">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" rows="5" ><?= $vaga->descricao?></textarea>
        </div>
        <div class="form-group">
            <label>Status</label>

            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s" checked> Ativo
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="n" <?= $vaga->ativo == 'n' ? 'checked' : '' ?>> Inativo
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success mt-3">Enviar </button>
        </div>
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
    </form>

</main>