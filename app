#! /usr/bin/env php 
<?php

use Symfony\Component\Console\Application;
use MeuApp\RenderCommand;

# composer autoloader
require "vendor/autoload.php";

# Criando a applicação
$app = new Application("meu app demo", "1.0");

# Registrando o comando
$app->add(new RenderCommand);
    
# Iniciando
$app->run();




