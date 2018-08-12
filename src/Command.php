<?php

namespace MeuApp;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class Command extends SymfonyCommand {
    protected $db;

    public function __construct(Database $db) {
        $this->db = $db;
        parent::__construct();
    }

    protected function exibirTarefas($output) {
        
        if(!$tarefas = $this->db->selecionarTudo('tarefas')) {
            return $output->writeln("<info>Você não possui tarefas no momento!</info>");
        }
        
        $table = new Table($output);

        $table->setHeaders(['Id', 'Descrição'])
              ->setRows($tarefas)
              ->render();
    }
}