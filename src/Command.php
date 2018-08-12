<?php

namespace MeuApp;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class Command extends SymfonyCommand {
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;

        parent::__construct();
    }

    public function configure() {
        
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        
    }

    public function exibirTarefas($output) {
        $table = new Table($output);

        $tarefas = $this->db->selecionarTudo('tarefas');

        $table->setHeaders(['Id', 'Descrição'])
              ->setRows($tarefas)
              ->render();
    }
}