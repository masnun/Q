<?php namespace Masnun\Q;

use Illuminate\Queue\Capsule\Manager as Queue;
use Illuminate\Encryption\Encrypter;

class Manager
{
    private $queue;

    public function __construct(
        $connectionDetails = [],
        $connectionName = 'default',
        $queueName = 'default'
    )
    {
        if (empty($connectionDetails)) {
            $connectionDetails = [
                'driver' => 'beanstalkd',
                'host' => 'localhost',
            ];
        }

        $connectionDetails['queue'] = $queueName;

        $this->queue = new Queue;
        $this->queue->getContainer()->bind('encrypter', function () {
            return new Encrypter('foobar');
        });
        $this->queue->addConnection($connectionDetails, $connectionName);
        $this->queue->setAsGlobal();
    }


    public function getQueue()
    {
        return $this->queue;
    }


}