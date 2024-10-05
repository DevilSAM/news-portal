<?php

namespace App\Services;

use Exception;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQProducer
{
    protected AMQPChannel $channel;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->channel = RabbitMQConnection::getInstance()->getChannel();
        $this->channel->queue_declare('telegram', false, true, false, false);
    }

    public function send(string $message): void
    {
        $msg = new AMQPMessage(json_encode($message));
        $this->channel->basic_publish($msg, '', 'telegram');
    }

    /**
     * @throws Exception
     */
    public function __destruct()
    {
        $this->channel->close();
    }
}
