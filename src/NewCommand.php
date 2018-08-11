<?php

namespace MeuApp;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use GuzzleHttp\ClientInterface;
use ZipArchive;

class NewCommand extends Command {
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        parent::__construct();
    }
    
    public function configure() {
        $this->setName("new")
             ->setDescription("Cria nova aplicação Laravel.")
             ->addArgument("nome", InputArgument::REQUIRED, "Nome do projeto.");
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $diretorio =  getcwd() . "/" . $input->getArgument('nome');
        
        $this->verificarAplicacaoNaoExiste($diretorio, $output);

        $output->writeln("<info>Criando aplicação Laravel...</info>");
        
        $this->baixarZip($zipFile = $this->fazerNomeArquivo())
             ->extrair($zipFile, $diretorio)
             ->limpar($zipFile);

        $output->writeln("<comment>Tudo pronto! Desenvolva algo incrível!!!</comment>");
    }

    private function verificarAplicacaoNaoExiste($diretorio, OutputInterface $output) {
        if(is_dir($diretorio)) {
            $output->writeln("<error>Aplicação já existe</error>");
            exit(1);
        }
    }

    private function fazerNomeArquivo() {
        return getcwd() . '/laravel_' . md5(time().uniqId()) . '.zip';
    }

    private function baixarZip($arquivoZip) {
        $response = $this->client->get('http://cabinet.laravel.com/latest.zip');
        file_put_contents($arquivoZip, $response->getBody());

        return $this;
    }

    private function extrair($zipFile, $diretorio) {
        $archive = new ZipArchive;

        $archive->open($zipFile);

        $archive->extractTo($diretorio);

        $archive->close();

        return $this;
    }

    private function limpar($zipFile) {
        @chmod($zipFile, 0777);
        @unlink($zipFile);

        return $this;
    }
    
}