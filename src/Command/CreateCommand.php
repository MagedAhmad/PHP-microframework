<?php

namespace TrendingRepos\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class CreateCommand extends Command
{
    abstract public function generateFileContent(string $className);

    public function execute(InputInterface $input, OutputInterface $output) 
    {
        $className = $input->getArgument('name');
        $fileName = $className. '.php';
        
        if($this->checkIfFileExists($fileName)) {
            $output->writeln('<error>File Already exists!</error>');
            exit(1);
        }
        $this->generateFile($fileName, $className);
        
        $output->writeln('<info>Built successfully</info>');
    }
    
    protected function generateFile(string $fileName, string $className) 
    {
        $content = $this->generateFileContent($className);
        
        file_put_contents($this->directory . $fileName, $content);
    }

    protected function checkIfFileExists(string $fileName): bool
    {
        $files = new \FilesystemIterator($this->directory);

        foreach($files as $file) {
            if ($file->getFilename() === $fileName) {

                return true;
            }
        }

        return false;
    }
}
