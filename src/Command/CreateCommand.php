<?php

namespace TrendingRepos\Command;

use Symfony\Component\Console\Command\Command;

abstract class CreateCommand extends Command
{
    abstract protected function generateFile(string $fileName, string $className);

    abstract protected function checkIfFileExists(string $fileName);

    abstract protected function generateFileContent(string $className);
}
