<?php
namespace Masnun\Q;

use Masnun\Q\Manager;
use Pheanstalk\Exception;


class Task
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

    public function fire($job, $data)
    {
        throw new \Exception("You must add a fire() method to your tasks!");
    }

    public function queue($data = [])
    {
        $className = get_class($this);
        $queue = $this->manager->getQueue();
        $queue->push($className, $data);
    }

    public function __invoke($data = [])
    {
        $this->queue($data);
    }

}