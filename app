#! /usr/bin/env php 
<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

# composer autoloader
require "vendor/autoload.php";

# Criando a applicação
$app = new Application("meu app demo", "1.0");

# Registrar o comando
$app->register("sayHelloTo")
    # Definindo descrição do comando
    ->setDescription("Offer a greeting to the given person")
    # Adicionar argumento
    // ->addArgument("name", InputArgument::REQUIRED)
    ->addArgument("name", InputArgument::OPTIONAL, "Your name.", "World")
    # Definir o código que será executado
    ->setCode(function(InputInterface $input, OutputInterface $output) {
        # Definir a saída do app
        $output->writeln("Hello {$input->getArgument('name')}");
    });

# Iniciar
$app->run();




