<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SpeakCommand extends Command
{
    public function configure()
    {
        $this->setName('speak')
             ->setDescription('speak a message')
             ->addArgument('message', InputArgument::OPTIONAL, 'What message should I speak?','Hello World');
    }
    
    public function execute(InputInterface $input, OutputInterface $output)
    {
        exec('say '.$input->getArgument('message'));
    }
}