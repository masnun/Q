<?php

namespace Masnun\Example;

use Masnun\Q\Task;

class FactorialTask extends Task
{

    public function fire($job, $data)
    {
        $number = $data['num'];
        $factorial = factorial($number);

        echo "Factorial of {$number} is {$factorial}" . PHP_EOL;
    }

}

function factorial($number)
{
    if ($number < 2) {
        return 1;
    } else {
        return ($number * factorial($number - 1));
    }
}