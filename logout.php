<?php

require __DIR__.'/vendor/autoload.php';
use App\Entity\User;
use App\Session\Login;

Login::logout();

$alertLogin = '';
$alertRegister = '';

if (isset($_POST['acao'])) {

    switch ($_POST['acao']) {
        case 'logar':
            $user = User::getUserByEmail($_POST['email']);
            
            if (!$user instanceof User || !password_verify($_POST['password'], $user->password)) {
                $alertLogin = "E-mail ou senha inválidos";
                break;
            }

            Login::login($user);
            break;
        case 'cadastrar':
            if (isset($_POST['user'], $_POST['email'], $_POST['password'])) {
                $user = new User;
                $user->user = $_POST['user'];
                $user->email = $_POST['email'];
                $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->cadastrar();
            }
            break;
    }
}

include "includes/header.php";
include "includes/formulario-login.php";
include "includes/footer.php";
