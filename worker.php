<?php

require_once 'vendor/autoload.php';
use Masnun\Q\Worker;

$worker = new Worker();
$worker->run();