<?php

namespace MeuApp;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ConcluirCommand extends Command {

    public function configure() {
        $this->setName('concluir')
             ->setDescription("Remove a tarefa escolhida da lista de tarefas.")
             ->addArgument("id", InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $id = $input->getArgument("id");
        
        $this->db->executar("DELETE FROM tarefas WHERE id=:id", compact('id'));

        $output->writeln("<info>Tarefa concluida!</info>");

        $this->exibirTarefas($output);
    }
}