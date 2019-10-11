<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use GuzzleHttp\ClientInterface;

class controllerCommand extends Command {

    private $client;
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        parent::__construct();
    }

    public function configure() {

        $this->setName('controller')
            ->setDescription('Create a new Controller')
            ->addArgument('name', InputArgument::REQUIRED, 'provide the controller name');
    }

    public function execute(InputInterface $input, OutputInterface $output) {

            $name = $input->getArgument('name'). ".php";

            $this->checkIfFileExists($name, $output);

            $this->buildController($name);

            $output->writeln("<info>Controller built successfully</info>");
    }

    private function buildController($name) {
        $response = $this->client->
            request('GET', 'https://filebin.net/8370wdbbewlgfi94/templateController.php?t=mzggn2rt')
            ->getBody();

        file_put_contents('app/controllers/'. $name, $response);

    }

    private function checkIfFileExists($name, $output) {
        $files = new \FilesystemIterator('app/controllers');
        foreach($files as $file) {
            if ($file->getFilename() == $name) {
                $output->writeln("<error>Controller already exists!</error>");
                exit(1);
            }
        }
    }
}