#! /usr/bin/env php
<?php

use TrendingRepos\Command\CreateControllerCommand;
use Symfony\Component\Console\Application;


require 'vendor/autoload.php';

$app = new Application("Project is under development", "1.0");

$app->add(new CreateControllerCommand(new GuzzleHttp\Client()));



$app->run();