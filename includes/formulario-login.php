<?php
$alertLogin = !empty($alertLogin) ? '<div class="alert alert-danger">'.$alertLogin.'</div>' : '';
$alertRegister = !empty($alertRegister) ? '<div class="alert alert-danger">'.$alertRegister.'</div>' : '';
?>

<div class="mt-4 p-5 bg-light text-dark rounded">

    <div class="row">

        <div class="col">

            <form method="post">
                <h2>Login</h2>

                <?= $alertLogin; ?>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit" name="acao" value="logar">Logar</button>
                </div>
            </form>
        </div>

        <div class="col">
            <form method="post">
                <h2>Cadastre-se</h2>
                <?= $alertRegister; ?>

                <div class="form-group">
                    <label>Usuário</label>
                    <input type="text" name="user" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit" name="acao" value="cadastrar">Cadastrar</button>
                </div>

            </form>
        </div>

    </div>

</div>