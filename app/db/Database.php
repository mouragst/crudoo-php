<?php

namespace App\db;

use PDO;
use PDOException;

class Database {
<<<<<<< HEAD
    const HOST = 'localhost';
    const NAME = 'cliente_tokens';
=======

    const HOST = 'localhost';
    const NAME = 'gm_vagas';
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
    const USER = 'root';
    const PASS = '';

    private $table;
    private $connection;

    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

<<<<<<< HEAD
    public function setConnection() {
=======
    private function setConnection() {
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
<<<<<<< HEAD
=======
            
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

<<<<<<< HEAD
    public function execute($query, $params = []) {
=======
    public function execute ($query, $params = []) {
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

<<<<<<< HEAD
    public function insert($values) {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), "?");

        $query = "INSERT INTO {$this->table} (".implode(", ", $fields).") VALUES (".implode(", ", $binds).")";
=======
    public function insert ($values) {

        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

<<<<<<< HEAD
    public function update($values, $id) {
        $fields = array_keys($values);

        $query = "UPDATE {$this->table} SET ".implode(" = ?, ", $fields)." = ? "." WHERE id = ".$id;

        // echo $query;

        return $this->execute($query, array_values($values));
    }
    
    public function delete($id) {
        $query = "DELETE FROM {$this->table} WHERE id = {$id}";

        return $this->execute($query);
    }

    public function select($where = null, $order = null, $limit = null, $field = '*') {
        $where = !empty($where) ? ' WHERE '.$where : '';
        $order = !empty($order) ? ' ORDER BY '.$order : '';
        $limit = !empty($limit) ? ' LIMIT '.$limit : '';

        $query = "SELECT {$field} from {$this->table} {$where} {$order} {$limit}";

        return $this->execute($query);
    }

}
=======
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
>>>>>>> edfbdbc7365dd84676b3e20a843d07ae7ffe32ef
