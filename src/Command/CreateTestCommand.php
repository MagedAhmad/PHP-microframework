<?php

namespace TrendingRepos\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTestCommand extends CreateCommand 
{
    public $directory = __DIR__ . '/../../tests/';

    public function configure() 
    {
        $this->setName('create:test')
            ->setDescription('Create a new Test')
            ->addArgument('name', InputArgument::REQUIRED, 'provide the test name');
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
