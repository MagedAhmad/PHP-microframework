<?php

namespace TrendingRepos\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTestCommand extends Command {

    const TEST_DIRECTORY = __DIR__ . '/../../tests/';

    public function configure() {
        $this->setName('create:test')
            ->setDescription('Create a new Test')
            ->addArgument('name', InputArgument::REQUIRED, 'provide the test name');
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
                $output->writeln('<error>Test already exists!</error>');
                exit(1);
            }

            $this->generateTest($fileName, $className);

            $output->writeln('<info>Test file built successfully</info>');
    }

    private function generateTest(string $fileName, string $className) {
        $content = $this->generateTestContent($className);
        
        file_put_contents(self::TEST_DIRECTORY. $fileName, $content);
    }

    private function checkIfFileExists(string $fileName): bool {
        $files = new \FilesystemIterator(self::TEST_DIRECTORY);

        foreach($files as $file) {
            if ($file->getFilename() === $fileName) {

                return true;
            }
        }

        return false;
    }

    private function generateTestContent(string $className): string {
        return <<<EOT
<?php

use PHPUnit\Framework\TestCase;

class $className extends TestCase
{
}
EOT;
    }
}
