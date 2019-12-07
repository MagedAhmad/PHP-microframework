<?php

namespace TrendingRepos\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateControllerCommand extends CreateCommand 
{

    const CONTROLLER_DIRECTORY = __DIR__ . '/../Controller/';

    public function configure() 
    {
        $this->setName('create:controller')
            ->setDescription('Create a new Controller')
            ->addArgument('name', InputArgument::REQUIRED, 'provide the controller name');
    }

    public function execute(InputInterface $input, OutputInterface $output) 
    {
            $className = $input->getArgument('name');
            $fileName = $className. '.php';
            
            if($this->checkIfFileExists($fileName)){
                $output->writeln('<error>Controller already exists!</error>');
                exit(1);
            }
            $this->generateFile($fileName, $className);
            $output->writeln('<info>Controller built successfully</info>');
    }

    protected function generateFile(string $fileName, string $className) 
    {
        $content = $this->generateFileContent($className);
        
        file_put_contents(self::CONTROLLER_DIRECTORY. $fileName, $content);
    }

    protected function checkIfFileExists(string $fileName): bool
    {
        $files = new \FilesystemIterator(self::CONTROLLER_DIRECTORY);

        foreach($files as $file) {
            if ($file->getFilename() === $fileName) {

                return true;
            }
        }

        return false;
    }

    protected function generateFileContent(string $className): string 
    {
        return <<<EOT
<?php 

namespace TrendingRepos\Controller;

class $className 
{ 

}
EOT;
    }
}
