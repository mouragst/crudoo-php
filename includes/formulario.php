<main>
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
    </form>

</main>