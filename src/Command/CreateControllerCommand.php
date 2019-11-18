<?php

namespace TrendingRepos\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateControllerCommand extends Command {

    const CONTROLLER_DIRECTORY = __DIR__ . '/../Controller/';

    public function configure() {
        $this->setName('create:controller')
            ->setDescription('Create a new Controller')
            ->addArgument('name', InputArgument::REQUIRED, 'provide the controller name');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * 
     */
    public function execute(InputInterface $input, OutputInterface $output) {
            $className = $input->getArgument('name');
            $fileName = $className. '.php';
            
            if($this->checkIfFileExists($fileName)){
                $output->writeln('<error>Controller already exists!</error>');
                exit(1);
            }

            $this->generateController($fileName, $className);

            $output->writeln('<info>Controller built successfully</info>');
    }

    private function generateController(string $fileName, string $className) {
        $content = $this->generateControllerContent($className);
        
        file_put_contents(self::CONTROLLER_DIRECTORY. $fileName, $content);
    }

    private function checkIfFileExists(string $fileName): bool {
        $files = new \FilesystemIterator(self::CONTROLLER_DIRECTORY);

        foreach($files as $file) {
            if ($file->getFilename() === $fileName) {

                return true;
            }
        }

        return false;
    }

    private function generateControllerContent(string $className): string {
        return <<<EOT
<?php 

namespace TrendingRepos\Controller;

class $className { 

}
EOT;
    }
}
