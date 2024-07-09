<?php

namespace App\Entity;

use App\db\Database;
use PDO;

class Vaga {

    /**
     * Identificador unico da vaga
     * @var integer
     */
    public $id;

    /**
     * Titulo da vaga
     * @var string
     */
    public $titulo;

    /**
     * Descrição da vaga
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga está ativa
     * @var string(s/n)
     */
    public $ativo;

    /**
     * Data de publicação da vaga
     * @var string
     */
    public $data;

    /**
     * Método responsável por cadastrar a vaga no banco de dados
     * @return boolean
     */
    public function cadastrar() {
        $this->data = date('Y-m-d H:i:s');

        $database = new Database('vagas');
        $this->id = $database->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data
        ]);

        return true;
    }

    /**
     * Método por atualizar a vaga no banco de dados
     * @return boolean
     */

    public function atualizar() {
        return (new Database('vagas'))->update('id = '.$this->id, [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data
        ]);
    }

    /**
     * Método por deletar a vaga no banco de dados
     * @return boolean;
     */
    public function deletar() {
        return (new Database('vagas'))->delete('id = '.$this->id);
    }

    /**
     * Método responsável por selecionar as vagas no banco de dados
     * 
     */
    public static function getVagas($where = null, $order = null, $limit = null) {
        return (new Database('vagas'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getVaga($id) {
        return (new Database('vagas'))->select('id = '. $id)->fetchObject(self::class);
    }

}
