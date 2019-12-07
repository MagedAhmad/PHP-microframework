<?php

namespace TrendingRepos\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTestCommand extends CreateCommand 
{
    const TEST_DIRECTORY = __DIR__ . '/../../tests/';

    public function configure() 
    {
        $this->setName('create:test')
            ->setDescription('Create a new Test')
            ->addArgument('name', InputArgument::REQUIRED, 'provide the test name');
    }

    public function execute(InputInterface $input, OutputInterface $output) 
    {
            $className = $input->getArgument('name');
            $fileName = $className. '.php';
            
            if($this->checkIfFileExists($fileName)){
                $output->writeln('<error>Test already exists!</error>');
                exit(1);
            }
            $this->generateFile($fileName, $className);
            $output->writeln('<info>Test file built successfully</info>');
    }

    protected function generateFile(string $fileName, string $className) 
    {
        $content = $this->generateFileContent($className);
        file_put_contents(self::TEST_DIRECTORY. $fileName, $content);
    }

    protected function checkIfFileExists(string $fileName): bool
    {
        $files = new \FilesystemIterator(self::TEST_DIRECTORY);

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

use PHPUnit\Framework\TestCase;

class $className extends TestCase
{
}
EOT;
    }
}
