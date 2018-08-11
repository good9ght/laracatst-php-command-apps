#! /usr/bin/env php 
<?php

use Symfony\Component\Console\Application;
use MeuApp\SayHelloCommand;

# composer autoloader
require "vendor/autoload.php";

# Criando a applicação
$app = new Application("meu app demo", "1.0");

# Registrar o comando
$app->add(new SayHelloCommand);
    
# Iniciar
$app->run();




