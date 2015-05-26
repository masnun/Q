<?php namespace Masnun\Q;

use Illuminate\Queue\Worker as IlluminateWorker;

class Worker
{

    private $manager;

    public function __construct($manager = null)
    {
        if (!$manager) {
            $this->manager = new Manager();
        } else {
            $this->manager = $manager;
        }
    }

    public function run(
        $connection = 'default',
        $queue = 'default',
        $delay = 0,
        $sleep = 0,
        $maxAttempts = 2
    )
    {
        $worker = new IlluminateWorker(
            $this->manager->getQueue()->getQueueManager(),
            null,
            null
        );

        while (true) {
            $worker->pop($connection, $queue, $delay, $sleep, $maxAttempts);
        }

    }

}