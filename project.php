#! /usr/bin/env php
<?php

use Acme\controllerCommand;
use Symfony\Component\Console\Application;


require 'vendor/autoload.php';

$app = new Application("Project is under development", "1.0");

$app->add(new controllerCommand(new GuzzleHttp\Client()));



$app->run();