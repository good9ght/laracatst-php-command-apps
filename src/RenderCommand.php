<?php

namespace MeuApp;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class RenderCommand extends Command {
    
    public function configure() {
        $this->setName("render")
             ->setDescription("Renderiza uma tabela.");
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $table = new Table($output);

        $table->setHeaders(['nome', 'idade'])
              ->setRows([
                ["Victor", "21"],
                ["John Doe", "20"],
                ["Jane Doe", "30"]
              ])
              ->render();
    }
}