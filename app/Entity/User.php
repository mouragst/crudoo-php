<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class User {

    public $id;
    public $user;
    public $email;
    public $password;

    public function cadastrar() {
        $database = new Database('users');

        $this->id = $database->insert([
            'user' => $this->user,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        return true;
    }
    
    public static function getUserByEmail($email) {
        return (new Database('users'))->select('email = "'.$email.'"')->fetchObject(self::class);
    }
}
