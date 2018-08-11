#! /usr/bin/env php 
<?php

use Symfony\Component\Console\Application;
use MeuApp\NewCommand;

# composer autoloader
require "vendor/autoload.php";

# Criando a applicação
$app = new Application("meu app demo", "1.0");

# Registrando o comando
$app->add(new NewCommand(new GuzzleHttp\Client));
    
# Iniciando
$app->run();




