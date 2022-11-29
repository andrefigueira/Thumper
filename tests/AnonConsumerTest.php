<?php

namespace Thumper\Test;

use Thumper\AnonConsumer;

class AnonConsumerTest extends BaseTest
{
    public function testQueueOptionsAreSetProperly()
    {
        $connection = $this->getMockConnection(['channel']);
        $connection->expects($this->once())
            ->method('channel');

        $consumer = new AnonConsumer($connection);

        $this->assertAttributeSame(
            [
                'name' => '',
                'passive' => false,
                'durable' => false,
                'exclusive' => true,
                'auto_delete' => true,
                'nowait' => false,
                'arguments' => null,
                'ticket' => null
            ],
            'queueOptions',
            $consumer
        );

        $this->assertAttributeSame($connection, 'connection', $consumer);
    }
}
