<?php

namespace MeuApp;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExibirCommand extends Command {

    public function configure() {
        $this->setName('exibir')
             ->setDescription('Lista todas as tarefas.');
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $this->exibirTarefas($output);
    }
}