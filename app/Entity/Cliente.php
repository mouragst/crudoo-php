<?php

namespace App\Entity;

use PDO;
use App\db\Database;

class Cliente {

    public $id;
    public $name;
    public $cpf;
    public $email;
    public $token;

    public function gerarToken() {
        $token = random_bytes(6);
        $token = bin2hex($token);
        return $token;
    }

    public function cadastrar() {
        $database = new Database('clientes');
        $this->id = $database->insert([
            'name' => $this->name,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'token' => $this->gerarToken(),
        ]);

        return true;
    }

    public function atualizar() {
        $database = new Database('clientes');
        $database->update([
            'name' => $this->name,
            'cpf' => $this->cpf,
            'email' => $this->email,
        ], $this->id);

        return true;
    }

    public function deletar($id) {
        return (new Database('clientes'))->delete($id);
    }

    public static function getQuantidadeClientes($where = null) {
        return (new Database('clientes'))->select($where, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
    }

    public static function getClientes($where = null, $order = null, $limit = null) {
        return (new Database("clientes"))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getCliente($id) {
        return (new Database('clientes'))->select(' id = '.$id)->fetchObject(self::class);
    }
}