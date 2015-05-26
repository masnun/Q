<?php namespace Masnun\Example;

use Masnun\Q\Task;

class EmailTask extends Task
{
    public function fire($job, $data)
    {
        echo "Sending email to: {$data['email']}" . PHP_EOL;
    }
}


