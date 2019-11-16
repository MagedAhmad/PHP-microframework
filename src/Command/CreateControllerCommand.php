<?php

namespace TrendingRepos\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use GuzzleHttp\ClientInterface;

class CreateControllerCommand extends Command {

    private $client;

    /**
     * controllerCommand constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        parent::__construct();
    }

    /**
     *
     */
    public function configure() {

        $this->setName('controller')
            ->setDescription('Create a new Controller')
            ->addArgument('name', InputArgument::REQUIRED, 'provide the controller name');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return vois
     */
    public function execute(InputInterface $input, OutputInterface $output) {

            $className = $input->getArgument('name');

            $name = $input->getArgument('name'). ".php";

            $this->checkIfFileExists($name, $output);

            $this->buildController($name, $className);

            $output->writeln("<info>Controller built successfully</info>");
    }

    /**
     * @param $name
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function buildController($name, $className) {

        // $response = $this->client->
        //     request('GET', 'https://drive.google.com/uc?export=download&id=1ZzmJlq0pC35CvbEP0iLeFVyCpGMof18l')
        //     ->getBody()->getContents();

        $response = $this->controllerContent($className);

        file_put_contents('src/Controller/'. $name, $response);

    }

    /**
     * @param $name
     * @param $output
     */
    private function checkIfFileExists($name, $output) {
        $files = new \FilesystemIterator('src/Controller');
        foreach($files as $file) {
            if ($file->getFilename() == $name) {
                $output->writeln("<error>Controller already exists!</error>");
                exit(1);
            }
        }
    }




    private function controllerContent($className) {
        return "<?php \n\nnamespace TrendingRepos\Controller;\n\nclass " . $className . "{ \n\n}";
    }
}