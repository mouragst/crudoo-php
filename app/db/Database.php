<?php

namespace App\db;

use PDO;
use PDOException;

class Database {

    const HOST = 'localhost';
    const NAME = 'gm_vagas';
    const USER = 'root';
    const PASS = '';

    private $table;
    private $connection;

    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection() {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function execute ($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function insert ($values) {

        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*') {
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$limit;

        return $this->execute($query);
    }

    public function update($where, $values) {
        $fields = array_keys($values);

        $query = "UPDATE {$this->table} SET ".implode(' = ?, ', $fields)."=? WHERE {$where}";
        return $this->execute($query, array_values($values));
    }

    public function delete($where) {
        $query = "DELETE FROM {$this->table} WHERE {$where}";

        return $this->execute($query);
    }
}
