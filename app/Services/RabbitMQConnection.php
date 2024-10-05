<?php

namespace App\Services;

use PhpAmqpLib\Channel\AbstractChannel;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Illuminate\Support\Facades\Config;

class RabbitMQConnection
{
    private static ?RabbitMQConnection $instance = null;
    private AMQPStreamConnection $connection;
    private AbstractChannel|AMQPChannel $channel;

    /**
     * @throws \Exception
     */
    private function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            Config::get('rabbit.host'),
            Config::get('rabbit.port'),
            Config::get('rabbit.username'),
            Config::get('rabbit.password')
        );
        $this->channel = $this->connection->channel();
    }

    public static function getInstance(): ?RabbitMQConnection
    {
        if (self::$instance === null) {
            self::$instance = new RabbitMQConnection();
        }
        return self::$instance;
    }

    public function getChannel(): AMQPChannel|AbstractChannel
    {
        return $this->channel;
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}
