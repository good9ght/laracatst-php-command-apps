<?php

namespace MeuApp;

use \PDO;

class Database {
    private $conexao;

    public function __construct(PDO $conexao) {
        $this->conexao = $conexao;
    }

    public function selecionarTudo($tabela) {
        return $this->conexao->query("select * from {$tabela}")->fetchAll();
    }

    public function executar($query, $parametros) {
        return $this->conexao->prepare($query)->execute($parametros);
    }
}