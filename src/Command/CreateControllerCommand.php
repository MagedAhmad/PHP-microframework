<?php

namespace TrendingRepos\Command;

use Symfony\Component\Console\Input\InputArgument;

class CreateControllerCommand extends CreateCommand 
{
    public $directory = __DIR__ . '/../Controller/' ;

    public function configure() 
    {
        $this->setName('create:controller')
            ->setDescription('Create a new Controller')
            ->addArgument('name', InputArgument::REQUIRED, 'provide the controller name');
    }

    public function generateFileContent(string $className): string 
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
