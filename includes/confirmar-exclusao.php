<main>

    <section>

    </section>

    <h2 class="mt-3">Excluir vaga</h2>

    <form method="post">
        <div class="form-group">
            <p>Você deseja realmente excluir a vaga <strong><?= $vaga->titulo?>?</strong></p>
        </div>

        <div class="form-group">
            <a href="index.php" class="btn btn-success">Cancelar</a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir </button>
        </div>
    </form>

</main>