<?php

require_once 'vendor/autoload.php';

use Masnun\Example\EmailTask;
use Masnun\Example\FactorialTask;

$emailTask = new EmailTask();
$emailTask->queue(['email' => 'masnun@gmail.com']);

$factorialTask = new FactorialTask();
$factorialTask->queue(['num' => 50]);